//********************************************************************
// CS50 - PSET 1: Water
// 
// Enter how many minutes you've spent in the shower and it will
// return how much water you've used in units of 16oz water bottles
//********************************************************************

#include <cs50.h>
#include <stdio.h>

int main(void)
{
    float length_of_shower, water_bottles_per_min, total_water_bottles;
    
    printf("What was the length of your shower in minutes? ");
    length_of_shower = GetFloat();
    
    // Error handling if equal to or less than 0
    while(length_of_shower <= 0) {
        printf("Zero minutes or less is not possible, sorry.");
        printf("Please try again.");
        length_of_shower = GetFloat();
    }
    
    // 1.5 gallons per min = 192 oz. 
    // Divided by 16 oz to convert into water bottles.
    water_bottles_per_min = 192.0 / 16.0;
    
    total_water_bottles = water_bottles_per_min * length_of_shower;
    
    printf("You used the equivelent of %.2f 16oz water bottles throughout your shower.\n",
    total_water_bottles);
    
    return 0;
}