/**
 * generate.c
 *
 * Generates pseudorandom numbers in [0,MAX), one per line.
 *
 * Usage: generate n [s]
 *
 * where n is number of pseudorandom numbers to print
 * and s is an optional seed
 */
 
 // Todo:
 // _XOPEN_SOURCE
 // srand48 - generates a seed
 // drand48 - generates a random number between 0.0 and 1.0
 
 
#define _XOPEN_SOURCE

#include <cs50.h>
#include <stdio.h>
#include <stdlib.h>
#include <time.h>

// upper limit on range of integers that can be generated
#define LIMIT 65536

int main(int argc, string argv[])
{
    // If a number and/or seed is not provided
    if (argc != 2 && argc != 3)
    {
        // Explain the usage and return from the program
        printf("Usage: ./generate n [s]\n");
        return 1;
    }

    // Converts the first argument from a string 
    // to a number
    int totalRandomNumbers = atoi(argv[1]);

    if (argc == 3)
    {
        // Use the second argument as a seed
        srand48((long) atoi(argv[2]));
    }
    else
    {
        // Seed is null
        srand48((long) time(NULL));
    }

    for (int i = 0; i < totalRandomNumbers; i++)
    {
        // Returns a value between 0.0 and 1.0 and multiplies
        // it by LIMIT
        printf("%i\n", (int) (drand48() * LIMIT));
    }

    // success
    return 0;
}
