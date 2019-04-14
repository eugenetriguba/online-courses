//*****************************************************************
// CS50 - PSET 2: Initials
//
// This program takes a name from a user at the command line and 
// and outputs its initials.
//
// Example: ./initials John Smith
// Output: JS
//*****************************************************************

#include <stdio.h>
#include <cs50.h>
#include <string.h>

void print_initials(string input);
int toupper(int c);

int main(void)
{
    string name;
    
    // Grab name from user
    name = get_string();
    
    // Print initials of name
    print_initials(name);
}

// Takes a word and prints the initials
void print_initials(string input)
{
    bool found_letter = false;
    int input_length = strlen(input);
    
    // Make sure input is valid
    if(input == NULL)
    {
        printf("Input cannot be null.");
    }
    
    // Loop through each character in input
    for(int i = 0; i < input_length; i++)
    {
        /* Adds the first letter to a string whenever
           we encounter another word. */
        if(input[i] == ' ')
        {
            found_letter = false;
        }
        else
        {
            if(found_letter == false)
            {
                printf("%c", toupper(input[i]));
            }
            found_letter = true;
        }
    }
    
    printf("\n");
}