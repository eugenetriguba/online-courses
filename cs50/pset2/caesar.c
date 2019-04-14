//*****************************************************************
// CS50 - PSET 2: Caesar
//
// This program takes a integer as the key at the commend line, then
// asks for a string to encrypt, and gives you back the encrypted 
// string based on the key provided.
//*****************************************************************

#include <stdio.h>
#include <string.h>
#include <ctype.h>
#include <cs50.h>

char encrypt_char(char c, int key);

int main(int argc, string argv[])
{
    // Make sure there is exactly 2 command line arguments
    if(argc > 2 || argc < 2)
    {
        printf("You must have exactly two command line arguments.\n");
        printf("Example: ./caesar 5\n");
        return 1;
    }
    
    printf("Enter your plaintext to encrypt: ");
    string plaintext = get_string();
    
    int key = atoi(argv[1]); 
    int plaintext_length = strlen(plaintext); 
    
    printf("plaintext: %s\n", plaintext);
    printf("ciphertext: ");
    
    /* Loop through each char */
    for(int i = 0; i < plaintext_length; i++)
    {
        char c = plaintext[i];
        
        // encrypt c and print it out.
        printf("%c", encrypt_char(c, key));
    }
    
    printf("\n");
}

// Encrypts a char, given a char & a key, and 
// returns the encrypted char back. If a char
// is not given, simply returns it back.
char encrypt_char(char c, int key) {
    bool is_uppercase = isupper(c);
    bool is_lowercase = islower(c);
    
    // check if the char is a char
    if(isalpha(c)) 
    {
        if(is_uppercase == true) {
            c -= 65;
            c += key;
            c %= 26;
            c += 65;
            return c;
        }
    
        if(is_lowercase == true) {
            c -= 97;
            c += key;
            c %= 26;
            c += 97;
            return c;
        }
    }
    
    // If not a char, return it back.
    return c;
}