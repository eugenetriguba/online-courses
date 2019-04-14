/**
 * fifteen.c
 *
 * Implements Game of Fifteen (generalized to d x d).
 *
 * Usage: fifteen d
 *
 * whereby the board's dimensions are to be d x d,
 * where d must be in [DIM_MIN,DIM_MAX]
 *
 * Note that usleep is obsolete, but it offers more granularity than
 * sleep and is simpler to use than nanosleep; `man usleep` for more.
 */
 
#define _XOPEN_SOURCE 500

#include <cs50.h>
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>

// constants
#define DIM_MIN 3
#define DIM_MAX 9

// board
int board[DIM_MAX][DIM_MAX];

// dimensions
int d;

// prototypes
void clear(void);
void greet(void);
void init(void);
void draw(void);
bool move(int tile);
bool won(void);

int main(int argc, string argv[])
{
    // ensure proper usage
    if (argc != 2)
    {
        printf("Usage: fifteen d\n");
        return 1;
    }

    // ensure valid dimensions
    d = atoi(argv[1]);
    if (d < DIM_MIN || d > DIM_MAX)
    {
        printf("Board must be between %i x %i and %i x %i, inclusive.\n",
            DIM_MIN, DIM_MIN, DIM_MAX, DIM_MAX);
        return 2;
    }

    // open log
    FILE *file = fopen("log.txt", "w");
    if (file == NULL)
    {
        return 3;
    }

    // greet user with instructions
    greet();

    // initialize the board
    init();

    // accept moves until game is won
    while (true)
    {
        // clear the screen
        clear();

        // draw the current state of the board
        draw();

        // log the current state of the board (for testing)
        for (int i = 0; i < d; i++)
        {
            for (int j = 0; j < d; j++)
            {
                fprintf(file, "%i", board[i][j]);
                if (j < d - 1)
                {
                    fprintf(file, "|");
                }
            }
            fprintf(file, "\n");
        }
        fflush(file);

        // check for win
        if (won())
        {
            printf("ftw!\n");
            return 0;
        }

        // prompt for move
        printf("Tile to move: ");
        int tile = get_int();
        
        // quit if user inputs 0 (for testing)
        if (tile == 0)
        {
            break;
        }

        // log move (for testing)
        fprintf(file, "%i\n", tile);
        fflush(file);

        // move if possible, else report illegality
        if (!move(tile))
        {
            printf("\nIllegal move.\n");
            usleep(500000);
        }

        // sleep thread for animation's sake
        usleep(500000);
    }
    
    // close log
    fclose(file);

    // success
    return 0;
}

/**
 * Clears screen using ANSI escape sequences.
 */
void clear(void)
{
    printf("\033[2J");
    printf("\033[%d;%dH", 0, 0);
}

/**
 * Greets player.
 */
void greet(void)
{
    clear();
    printf("WELCOME TO GAME OF FIFTEEN\n");
    usleep(2000000);
}

/**
 * Initializes the game's board with tiles numbered 1 through d*d - 1
 * (i.e., fills 2D array with values but does not actually print them).  
 */
void init(void)
{
    int row, column;
    // total tiles on the board minus the starting tile
    int counter = d * d - 1;
    
    // Iterate over each row
    for(row = 0; row < d; row++)
    {
        // Iterate over each column
        for(column = 0; column < d; column++)
        {
            board[row][column] = counter;
            counter--;
        }
    }
    
    // Check for even board to swap 1 & 2
    if((d * d) % 2 == 0)
    {
        board[d - 1][d - 2] = 2;
        board[d - 1][d - 3] = 1;
    }
}

/**
 * Prints the board in its current state.
 */
void draw(void)
{
    int row, column;
    int blank_tile = 0;
    
    // Iterate over each row
    for(row = 0; row < d; row++)
    {
        // Iterate over each column
        for(column = 0; column < d; column++)
        {
            // for last tile, number should not be shown.
            if(board[row][column] == blank_tile)
            {
                printf(" _  ");
            }
            // Correct spacing for numbers over 9
            else if(board[row][column] > 9)
            {
                printf("%i  ", board[row][column]);
            }
            // Correct spacing for numbers 9 and under
            else 
            {
                printf("%2i  ", board[row][column]);
            }
        }
        printf("\n");
    }
}

/**
 * If tile borders empty space, moves tile and returns true, else
 * returns false. 
 */
bool move(int tile)
{
    int row, column;
    int blank_tile = 0;
    int temp;
    
    // Iterate over each row
    for(row = 0; row < d; row++)
    {
        // Iterate over each column
        for(column = 0; column < d; column++)
        {
            // Found the tile on the board that
            // equals the tile we're looking for.
            if(tile == board[row][column])
            {
                // Makes sure we're not accessing a tile that we shouldn't have access to
                if (column > 0)
                {
                    // checks if blank space is to the left of the tile
                    if(board[row][column-1] == blank_tile)
                    {
                        temp = tile;
                        board[row][column] = board[row][column-1];
                        board[row][column-1] = temp;
                        return true;
                    }
                }
                
                // Makes sure we're not accessing a tile that we shouldn't have access to
                if (row > 0)
                {
                    // checks if blank space is above the tile
                    if(board[row-1][column] == blank_tile)
                    {
                        temp = tile;
                        board[row][column] = board[row - 1][column];
                        board[row-1][column] = temp;
                        return true;
                    }
                }
                
                // Makes sure we're not accessing a tile that we shouldn't have access to
                if (column < d-1)
                {
                    // checks if blank space is to the right of the tile
                    if(board[row][column+1] == blank_tile)
                    {
                        temp = tile;
                        board[row][column] = board[row][column+1];
                        board[row][column+1] = temp;
                        return true;
                    }
                }
                
                // Makes sure we're not accessing a tile that we shouldn't have access to
                if (row < d-1)
                {
                    // checks if blank space is below the tile
                    if(board[row+1][column] == blank_tile)
                    {
                        temp = tile;
                        board[row][column] = board[row+1][column];
                        board[row+1][column] = temp;
                        return true;
                    }
                }
            }
        }
    }
    
    // If move is not legal, return false
    return false;
}

/**
 * Returns true if game is won (i.e., board is in winning configuration), 
 * else false.
 */
bool won(void)
{
    int row, column;
    int blank_tile = 0;
    int counter = 1;

    // Iterate over each row
    for(row = 0; row < d; row++)
    {
        // Iterate over each column
        for(column = 0; column < d; column++)
        {
            if (board[row][column] == blank_tile)
            {
                counter = 0;
            }
            
            // Checks if all the other values are where they are supposed to be     
            if (board[row][column] != counter)
            {
                return false; 
            }
            
            counter++;
        }
    }
    
    return true;
}
