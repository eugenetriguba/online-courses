//***************************************************************
// CS50 - PSET 1: Credit
// This file passes all the CS50 checks, but I haven't gotten 
// Luhn's algorithm working yet. I can't actually tell from the
// instructions if it's required to.
//
// Enter in your credit card number and it will test to see if it
// is a valid Visa, Mastercard, or American Express credit card.
//***************************************************************

#include <cs50.h>
#include <stdio.h>
#include <math.h>

int main(void)
{
    long long int credit_card_number;
    int credit_card_length, first_num;
    string credit_card_type;
    bool is_valid = true;
    
    printf("Enter your credit card number to check validity: ");
    credit_card_number = GetLongLong();
    
    if(is_valid == true)
    {
        
        credit_card_length = floor(log10(llabs(credit_card_number))) + 1;
        
        // Credit card length error handling
        if (credit_card_length < 1)
        {
            printf("INVALID\n");
            is_valid = false;
            return 0;
        }
        
        // Grab first number of the credit card
        switch(credit_card_length)
        {
            case 16: 
                first_num = credit_card_number / 1000000000000000;
                break;
            case 15:
                first_num = credit_card_number / 100000000000000;
                break;
            case 14:
                first_num = credit_card_number / 10000000000000;
                break;
            case 13:
                first_num = credit_card_number / 1000000000000;
                break;
            default:
                printf("INVALID\n");
                is_valid = false;
                return 0;
            
        }
    
        // Compare first number to what a VISA, American Express,
        // and Mastercard would be
        switch(first_num)
        {
            case 4:
                credit_card_type = "VISA";
                break;
            case 5:
                    credit_card_type = "MASTERCARD";
                break;
            case 3:
                credit_card_type = "AMEX";
                break;
            default:
                printf("INVALID\n");
                is_valid = false;
                return 0;
            
        }
        
        // Use Luhn's Algorithm to find out if credit card number is valid
        // Not Complete
        int every_other_num_counter = 1;
        for(int i = credit_card_length; i > 0; i--) {
            every_other_num_counter++;
        }
    
        printf("%s\n", credit_card_type);
    }
    
    return 0;
}