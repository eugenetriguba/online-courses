//*****************************************************************
// CS50 - PSET 2: Vigenere
//
// This program takes a integer as the key at the commend line, then
// asks for a string to encrypt, and gives you back the encrypted 
// string based on the key provided.
//*****************************************************************

#include <stdio.h>
#include <string.h>
#include <ctype.h>
#include <cs50.h>

char encrypt_char(char c, int key_number);
string encrypt_plaintext(string plaintext, string key);

// Needed key_index accessible in both encrypt_plaintext & char
int key_index = 0;

int main(int argc, string argv[])
{
    // Make sure there is exactly 2 command line arguments
    if(argc > 2 || argc < 2)
    {
        printf("You must have exactly two command line arguments.\n");
        printf("Example: ./vigenere hello\n");
        return 1;
    }
    
    printf("Enter your plaintext to encrypt: ");
    string plaintext = get_string();
    
    string key = argv[1];
    string ciphertext = encrypt_plaintext(plaintext, key);
    
    printf("plaintext: %s\n", plaintext);
    printf("ciphertext: %s\n", ciphertext);
}

string encrypt_plaintext(string plaintext, string key) 
{
    int plaintext_length = strlen(plaintext);
    char ciphertext[strlen(plaintext)];
    int key_array[strlen(key)];
    int key_position = 0;
    int i;
    
    // Turn key into an array of ints
    for(i = 0; i < strlen(key); i++)
    {
        int k = key[i];
        key_array[i] = k;
    }
    
    for(i = 0; i < plaintext_length; i++)
    {
        char c = plaintext[i];
        ciphertext[i] = encrypt_char(c, key_array[key_position % 26]);
    }
    
    return ciphertext;
}

char encrypt_char(char c, int key_number)
{
    // check if c is a char
    if(isalpha(c)) 
    {
        if(isupper(c) == true) {
            c -= 65;
            c += key_number;
            c %= 26;
            c += 65;
            key_index++;
            return c;
        }
    
        if(islower(c) == true) {
            c -= 97;
            c += key_number;
            c %= 26;
            c += 97;
            key_index++;
            return c;
        }
    }
    
    return c;
}