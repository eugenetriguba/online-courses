#include <stdio.h>
#include <stdlib.h>

#include "bmp.h"

int main(int argc, char *argv[])
{
    // Ensure proper usage
    if (argc != 4)
    {
        fprintf(stderr, "Usage: ./resize resizeValue infile outfile\n");
        return 1;
    }
    
    // Remember resize value & filenames
    int resizeValue = atoi(argv[1]);
    char *infile = argv[2];
    char *outfile = argv[3];
    
    // Ensure resizeValue is <= 100 and > 1
    if (resizeValue > 100 || resizeValue < 1)
    {
        fprintf(stderr, "Resize value must be less than 101 but greater than 0.\n");
        return 2;
    }

    // Open input file 
    FILE *inptr = fopen(infile, "r");
    if (inptr == NULL)
    {
        fprintf(stderr, "Could not open %s.\n", infile);
        return 3;
    }

    // Open output file
    FILE *outptr = fopen(outfile, "w");
    if (outptr == NULL)
    {
        fclose(inptr);
        fprintf(stderr, "Could not create %s.\n", outfile);
        return 4;
    }

    // Read infile's BITMAPFILEHEADER
    BITMAPFILEHEADER bf, bf_r;
    fread(&bf, sizeof(BITMAPFILEHEADER), 1, inptr);
    bf_r = bf;

    // Read infile's BITMAPINFOHEADER
    BITMAPINFOHEADER bi, bi_r;
    fread(&bi, sizeof(BITMAPINFOHEADER), 1, inptr);
    bi_r = bi;

    // Ensure infile is (likely) a 24-bit uncompressed BMP 4.0
    if (bf.bfType != 0x4d42 || bf.bfOffBits != 54 || bi.biSize != 40 || 
        bi.biBitCount != 24 || bi.biCompression != 0)
    {
        fclose(outptr);
        fclose(inptr);
        fprintf(stderr, "Unsupported file format.\n");
        return 5;
    }
    
    // Determine new image width & heights
    bi_r.biWidth  *= resizeValue;
    bi_r.biHeight *= resizeValue;
    
    // Determine old and new padding for scanlines
    int padding = (4 - (bi.biWidth * sizeof(RGBTRIPLE)) % 4) % 4;
    int res_padding = (4 - (bi_r.biWidth * sizeof(RGBTRIPLE)) % 4) % 4;
    
    // Determine new image sizes
    bi_r.biSizeImage = (bi_r.biWidth * sizeof(RGBTRIPLE) + res_padding) * abs(bi_r.biHeight);
    bf_r.bfSize = bf.bfSize - bi.biSizeImage + bi_r.biSizeImage;

    // Write outfile's BITMAPFILEHEADER
    fwrite(&bf_r, sizeof(BITMAPFILEHEADER), 1, outptr);
    
    // Write outfile's BITMAPINFOHEADER
    fwrite(&bi_r, sizeof(BITMAPINFOHEADER), 1, outptr);

    // Iterate over infile's scanlines
    for (int i = 0, biHeight = abs(bi.biHeight); i < biHeight; i++)
    {
        // Iterate over scanlines resizeValue times
        for (int m = 0; m < resizeValue; m++) 
        {
            // Iterate over pixels in scanline
            for (int j = 0; j < bi.biWidth; j++)
            {
                // Temporary storage
                RGBTRIPLE triple;
    
                // Read RGB triple from infile
                fread(&triple, sizeof(RGBTRIPLE), 1, inptr);
    
                // Write RGB triple to outfile, resizeValue times
                for (int l = 0; l < resizeValue; l++)
                    fwrite(&triple, sizeof(RGBTRIPLE), 1, outptr);
            }
    
             // Add a new padding
            for (int k = 0; k < res_padding; k++)
                fputc(0x00, outptr);
                
            // Return to the beginning of a scanline
            if (m < resizeValue - 1) {
                long offset = bi.biWidth * sizeof(RGBTRIPLE);
                fseek(inptr, -offset, SEEK_CUR);
            }
        }
        // Skip over padding, if any
        fseek(inptr, padding, SEEK_CUR);
    }

    // Close infile
    fclose(inptr);

    // Close outfile
    fclose(outptr);

    // Success
    return 0;
}
