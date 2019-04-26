#include <stdio.h>

int hole[17];
int Player = 1;
int inputUser;

void inisialisasiPermainan(){

    for (int j = 1; j <= 16; j++) {
            if (j==8 || j == 16){
                hole[j] == 0;
            }
            else
            {
             hole[j] = 7;    
            }
            
    }
}

void BoardView(){
    
    printf("\n\n\t");
    for (int i = 15; i >= 9; i--)
    {
        if (i == 9)
        {
            printf("%d\n\n", hole[i]);
        }

        else
        {
            printf("%d ", hole[i]);
        }
        
    }

    printf("%d\t\t\t    %d\n\n",hole[16],hole[8]);

    printf("\t");
    for (int i = 1; i <= 7; i++)
    {
        if (i == 7)
        {
            printf("%d\n\n\n", hole[i]);
        }

        else
        {
            printf("%d ", hole[i]);
        }
        
    }
    
}


int switchPlayer(){
    if (Player == 1)
    {
        return 2;
    }
    else
    {
        return 1;
    }
}

void fillTheHole(int index){

    int i = index;
    while (hole[index]--)
    {
        i++;

        if (i > 16)
        {
            i = 1;
        }
        
        hole[i]++;
    }

    hole[index]++;
    BoardView();


    if (i == 8 && Player == 1)
    {   
        return;
    }
    else if (i == 16 && Player == 2)
    {
        return;
    }
    
    

    else if (hole[i]>1)
    {
        return fillTheHole(i);
    }


    Player = switchPlayer();
}


bool isHolesPlayerEmpty(int start,int finish){
    for (int i = start; i <= finish; i++)
    {
        if (hole[i] != 0)
        {
            return false;
        }
    }

    return true;
}

int pickWinner(){
    if (hole[8] > hole[16])
    {
        return 1;
    }
    
    else if(hole[16] > hole[8])
    {
        return 2;
    }
    
    else
    {
        return 3;
    }
}


int main(int argc, char const *argv[])
{



    int winner = 0;
    inisialisasiPermainan();
    BoardView();

    printf("Selamat Datang  di Dakon Game!!!\n\n\n");

    while (hole[8] + hole[16] != 98)
    {


        printf("Giliran Pemain %d\n\n", Player);
        printf("Pemain %d memilih hole nomor: ", Player);scanf("%d", &inputUser);
        
        
        while(inputUser>7 || inputUser < 1)
        {
            printf("hole tidak ditemukan!!\n\n");
            printf("Pemain %d memilih hole nomor: ", Player);scanf("%d", &inputUser);            
        }
        

        if (Player == 1)
        {   

            while (hole[inputUser]==0)
            {
                printf("hole kosong!!pilih hole lain\n\n");
                printf("Pemain %d memilih hole nomor: ", Player);scanf("%d", &inputUser);
            }
            fillTheHole(inputUser);
            
            

        }
        else
        {
            while (hole[inputUser+8]==0)
            {
                printf("hole kosong!!pilih hole lain\n\n");
                printf("Pemain %d memilih hole nomor: ", Player);scanf("%d", &inputUser);
            }
            fillTheHole(inputUser+8);
        }

        if (isHolesPlayerEmpty(1,7) || isHolesPlayerEmpty(9,15))
            {   
                winner = pickWinner();
                break;   
            }

    }

    if (winner <= 2)
    {
        printf("Selamat kepada Player %d\n\n", winner);
        printf("SKOR: %d %d\n", hole[8],hole[16]);        
    }
    else
    {
        printf("SERI\n\n");
        printf("SKOR: %d %d\n", hole[8],hole[16]);
    }

    return 0;
}
