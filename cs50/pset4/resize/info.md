 - Update header info, new bmp -> new header info
    - file size - bfSize: total size of file (in bytes, includes pixels, padding, and headers)
        - bf.bfSize = bi.biSizeImage + sizeof(BITMAPFILEHEADER) + sizeof(BITMAPINFOHEADER)
    - image size - biSizeImage: total size of image (in bytes, includes padding & pixels)
        - bi.biSizeImage = ((sizeof(RGBTRIPLE) * bi.biWidth) + padding) * abs(bi.biHeight)
    - width - biwidth: width of image (does not include padding)
    - height - biheight: height of image (in pixels)

    Old:
        - bi.biWidth
        - bi.biHeight
        - bi.biSizeImage
        - bf.bfSize
        - padding
     
    New:
        - bi.biWidth *= n
        - bi.biHeight *= n
        - ?
        - ?
        - ?
     
Reading files
    - fread(data, size, number inptr)
        - data: pointer to a struct that will contain the bytes you're reading
        - size: size of each element to read
            - sizeof
        - number: number of elements to read
        - inptr: FILE * to read from
        
Resizing horizontally

    for each pixel in row
        write n times
        
    Orange Red Blue would be Orange Orange Red Red Blue Blue
    
Writing files
    fwrite(data, size, number, outptr)
        - data: pointer to the struct that contains the bytes you're reading from
        - size
        - number
        - outptr: FILE * to write to
        
Padding
    - each pixel is 3 bytes
    - length of each scanline must be a multiple of 4 bytes
    - if the number of pixels isn't a multiple of 4, we need "padding"
        - padding just zeros (0x00)
        
    - Each rgbtriple is 3 bytes and we want it to be a multiple of 4, which is why we add padding.
    
    - padding = (4 - (bi.biWidth * sizeof(RGBTRIPLE)) % 4) % 4
    
    - The outfile and infile have different widths
        - so the padding is different!
        
    - padding isn't an rgbtriple
        - we can't fread padding

Writing padding
    - fputc(chr, outptr)
        - chr: char to write
        - outptr: FILE * to write to
        
    - fputc(0x00, outptr)
    
pseudocode: resizing horizontally
    for each row
        for each pixel in row
            write to outfile n times
        write outfile's padding
        skip over infile's padding