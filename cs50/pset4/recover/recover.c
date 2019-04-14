#include <stdio.h>

int main(int argc, char *argv[])
{
    // Ensure proper usage.
    if (argc != 2) {
        fprintf(stderr, "Usage: ./recover filename");
        return 1;
    }
    
    // Check if image is able to be read.
    if (argv[1] == NULL) {
        fprintf(stderr, "Image cannot be opened.");
        return 2;
    }
    
    char *filename = malloc(sizeof(char) * 500);
    
    // Open the image file
    FILE *raw_file = fopen(argv[1], "r");
    fread(buffer, 512, 1, raw_file);
    
    // Find beginning of JPEG
    if (buffer[0] == 0xff && buffer[1] == 0xd8 &&
        buffer[2] == 0xff && (buffer[3] & 0xf0) == 0xe0]) 
    {
        // Open a new JPEG
        // filenames: ###.jpg
        // named in the order in which they are found, starting at 000 (keep track)
        sprinf(filename, "%03i.jpg", 2);
        FILE *img = fopen(filename, "w");
        
        // Write 512 bytes until new JPEG is found
        fwrite(data, size, number, *img);
        
        // detect end of file: EOF
        if (EOF) 
            break;
    }
    
    // Free the memory from filename
    free(filename);
    
    // Close the image file
    fclose(raw_file);
    
    // All is well.
    return 0;
}