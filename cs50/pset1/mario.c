//***************************************************************
// CS50 - PSET 1: Mario
//
// Enter in a height and this program will generate two half
// pyramids using hash (#) symbols.
//
// Works but needs refactoring.
//***************************************************************

#include <cs50.h>
#include <stdio.h>

int GetPositiveInt(void);

int main(void)
{
    int height, hashes, spaces;
    
    printf("Enter the height of the pyramid: ");
    height = GetPositiveInt();
    
    /* Add 'hashes' & 'spaces' to keep track of the
       amount of each. */
    hashes = 1;
    spaces = height - 1;
    
    for(int i = 0; i < height; i++) 
    {
        /* Add counters for 'hashes' & 'spaces'
           while in the loop. */ 
        int hashes_counter = hashes;
        int spaces_counter = spaces;
        
        while(spaces_counter != 0)
        {
            printf(" ");
            spaces_counter--;
        }
        
        while(hashes_counter != 0)
        {
            printf("#");
            hashes_counter--;
        }
        
        // Second pyramid
        hashes_counter = hashes;
        printf(" ");
        while(hashes_counter != 0)
        {
            printf("#");
            hashes_counter--;
        }

        printf("\n");
        
        hashes++;
        spaces--;
    }
    
    return 0;
}

int GetPositiveInt(void)
{
    int n;
    do
    {
        n = GetInt();
        if(n <= 0)
        {
            printf("Sorry, can't be negative: ");
        }
    }
    while (n <= 0);
    
    return n;
}