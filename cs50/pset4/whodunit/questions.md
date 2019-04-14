1. What’s stdint.h?
 - It includes typedefs and macros for making integer variables of custom sizes
 
2. What’s the point of using uint8\_t, uint32\_t, int32\_t, and uint16\_t in a program?
 - You can fill up exactly the amount of space you want in a file which is good
for things like bitmap headers.

3. How many bytes is a BYTE, a DWORD, a LONG, and a WORD, respectively (assuming a 32-bit architecture)?
 - BYTE = 8 bits = 1 byte
 - DWORD= 32 bits = 4 bytes
 - LONG = signed 32 bits = 4 bytes
 - WORD = 16 bits = 2 bytes
 
4. What (in ASCII, decimal, or hexadecimal) must the first two bytes of any BMP file be? Leading bytes used to identify file formats (with high probability) are generally called "magic numbers."
 - The character "B" then "M" in ASCII encoding
 
5. What’s the difference between bfSize and biSize?
 - bfSize is the size of the whole bmp file, which includes the headerfiles.
 - biSize is the size of the BITMAPINFOHEADER header file. biSize is constant and it equals 14 bytes.
 
6. What does it mean if biHeight is negative?
 - the bitmap is a top-down DIB and its origin is the upper-left corner. Top-down DIBs cannot be compressed.
 
7. What field in BITMAPINFOHEADER specifies the BMP’s color depth (i.e., bits per pixel)?
 - biBitCount
 
8. Why might fopen return NULL in lines 24 and 32 of copy.c?
 - It can't find the file.

9. Why is the third argument to fread always 1 in our code?
 - It specifies how many elements you want to read, and we're always
reading a struct so we only need 1 struct.

10. What value does line 65 of copy.c assign to padding if bi.biWidth is 3?
 - (4 - (bi.biWidth * sizeof(RGBTRIPLE) % 4) % 4 = (4 - (3 * 3 % 4)) % 4 =
 - (4 - 1) % 4 = 3 % 4 = 3
11. What does fseek do?
 - It moves to a specific location in a file.
12. What is SEEK_CUR?
 - An integer constant which, when used as the 'whence' argument to the
fseek or fseeko function, specifies that the offset provided is relative to
the current file position.