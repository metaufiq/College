#include <bits/stdc++.h>

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

int fillTheHole();

void fillTheHolerand(int index){

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
        return fillTheHolerand(i);
    }


    Player = switchPlayer();
}

int fillTheHole(){
    int temp,best=0,lub=0,index,kol;
    for(int i=1;i<=7;i++){
            index=i;
            kol=hole[index];
            temp=hole[8];
        while (kol--)
        {
            index++;

            if (index > 16)
            {
                index = 1;
            }
            if(index==8)temp++;
        }
        if(best<temp-hole[8]){
            lub=i;
            best=hole[8]+(temp-hole[8]);
        }
    }
    if(lub==0){
        int num=(9 + (rand() % (int)(15 - 9 + 1)));
        while(hole[num]==0)num=(9 + (rand() % (int)(15 - 9 + 1)));
        return num;
    }
    else return lub;
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





        if (Player == 1)
        {
                        
            inputUser = fillTheHole();
            printf("%d\n",inputUser);

            while (hole[inputUser]==0)
            {
                printf("hole kosong!!pilih hole lain\n\n");
                printf("Pemain %d memilih hole nomor: ", Player);
            }

            printf("Pemain %d memilih hole nomor: %d", Player, inputUser);
            fillTheHolerand(inputUser);
        }
        else
        {   
            int num = 0;
            num=(9 + (rand() % (int)(15 - 9 + 1)));
            printf("Pemain %d memilih hole nomor: %d", Player,num);//scanf("%d", &num);
            while (hole[num]==0)
            {
                printf("hole kosong!!pilih hole lain\n\n");
                num=(9 + (rand() % (int)(15 - 9 + 1)));
                printf("Pemain %d memilih hole nomor: %d", Player, num);//scanf("%d", &num);
            }
            fillTheHolerand(num);
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

    printf("\n\nSelesai\n");
    return 0;
}
