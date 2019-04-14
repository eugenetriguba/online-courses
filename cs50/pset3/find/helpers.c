/**
 * helpers.c
 *
 * Helper functions for Problem Set 3.
 */
 
#include <cs50.h>
#include "helpers.h"

/*
 * Returns true if value is in array of n values, else false.
 * value = value you're looking for
 * values = array of all values
 * n = size of the array
 */
 
// Binary Search
bool search(int value, int values[], int n)
{
    int size_of_array = n;
    int first_position = 0;
    int last_position = size_of_array - 1;
    int middle_position = size_of_array / 2;
    
    while(first_position <= last_position) {
        
        // If middle_position is the value we're looking
        // for, return it.
        if(values[middle_position] == value) 
        {
            return true;
        } 
        // If middle_position is smaller than value
        else if(values[middle_position] < value) 
        {
            first_position = middle_position + 1;
        } 
        // Else middle_position is bigger than value
        else 
        {
            last_position = middle_position - 1;
        }
        
        // Recalculate middle_position
        middle_position = (first_position + last_position) / 2;
    }
    
    // value must not be there
    return false;
}

/*
 * Sorts array of n values.
 */
// Bubble Sort
void sort(int values[], int n)
{
    bool swapped = false;
    int placeholder;
    int last_position = n - 1;
    int i, j;
    
    for(i = 0; i < last_position; i++)
    {
        swapped = false;
        
        for(j = 0; j < last_position - 1; j++)
        {
            if(values[j] > values[j + 1])
            {
                placeholder = values[j];
                values[j] = values[j + 1];
                values[j + 1] = placeholder;
                
                swapped = true;
            }
        }
        
        if(swapped == false) {
            break;
        }
    }
}
