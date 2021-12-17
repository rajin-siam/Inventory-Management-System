#include <stdio.h>
#include <stdlib.h>
#include<stdbool.h>
int saving_in_file(vaccine);
struct userdata{
    char s[100][100];
};

bool check_birth_digit(char s[])
{
    int l=strlen(s);
    if(l==17)return true;
    else
        return false;
}

int check_age_elegibility(int day,int month,int year)
{
    bool eligible=false;
    if(2021-year>=18)eligible=true;
    if(eligible==true)
    {
        if(month-1>=0)eligible=true;
        else eligible=false;
    }
    else
    {
        if(day-1>=0)eligible=true;
        else eligible=false;
    }
    return eligible;
}

struct vaccine
{
    char name[100];
    char national_ID[100],gender[4],blood_group[8];
    char address[100];
    bool eligibility;
    char phone_number;
    int birth_day,birth_month,birth_year;
    int vaccine_type;
};
int regestration()
{
    //at first in this panel you will fill these fields
    //national id
    //name
    //gender
    //blood group
    //date of birth(day,month,year)
    //then you will check eligibility
    //if the person is eligible you will tell him to chose vaccine.
    struct vaccine x;
    while(true)
    {
        printf("............................Input National ID : ");
        scanf("%s",x.national_ID);
        if(true==check_birth_digit(x.national_ID))break;
        else printf("Birth digit is in correct...Try again\n");

    }
    fflush(stdin);
    printf("............................Input Name : ");
    fgets(x.name,100,stdin);
    printf("|...........................Input Gender : ");

    fgets(x.gender,2,stdin);
    fflush(stdin);
    printf("|...........................Input Blood Group : ");
    fgets(x.blood_group,6,stdin);
    fflush(stdin);
    printf("|...........................Enter your Birth date : \n");
    printf("|...........................Birth day   : ");scanf("%d",&x.birth_day);
    printf("\n|...........................Birth month : ");scanf("%d",&x.birth_month);
    printf("\n|...........................Birth year : ");scanf("%d",&x.birth_year);


    printf("========================================================\n");
    printf("\n\nCONGRATULATION......ACCOUNT IS CREATED.\NPLEASE WAIT FOR FURTHER CONFIRMATION\n\n");
    printf("========================================================\n");
    bool check;
    check=check_age_elegibility(x.birth_day,x.birth_month,x.birth_year);
    if(check==true)
    {
        x.eligibility=true;
        printf("You are eligible for vaccination\n");
    }
    else {
        x.eligibility=false;
        printf("You are not eligible for vaccination\n");

    }
    if(check==true)
    {
        printf("............................Which vaccine do You want \n: ");
        printf("1.Phizer 2.Shinopharm 3.Astrozeneka : ");
        printf("chose............................ : ");scanf("%d",&x.vaccine_type);
        saving_in_file(x);
    }
}

admin_panel()
{

    FILE *file2;
    file2=fopen("vaccine database.txt","r");
    char data[100][1000];
    int i=0;
    while(fgets(data[i],sizeof(data[i]),file2))
    {
       // printf("%s",data[i]);
        i++;
    }
    int n=i+1;
    int j;
    fclose(file2);
    
        //national id  a[0]
        //name         a[1]
        //gender       a[2]
        //blood group  a[3]
    //date of birth    a[4]
        //eligible     a[5]
        //vaccine type a[6]
    struct userdata a[5];
    for(i=0,j=0;i<n;i++)
    {
        strcpy(a[i/7].s[i%7],data[i]);j++;
    }

    for(i=0;i<n;i++)
    {
        printf("%s",a[i/7].s[i%7]);
    }
}
int menu()
{
    printf("|-------------------------------------------------------------------------------|\n");
    printf("|----------------------------------Covid Vaccine Bd-----------------------------|\n");
    printf("|-------------------------------------------------------------------------------|\n");
    printf("\t\t\t 1. Covid Vaccine Regestration\n");
    printf("\t\t\t 2. Vaccine Status\n");
    printf("\t\t\t 3. Admin Panel\n");
    printf("\t\t\t 4. Exit\n");
    printf("\n\n");
    printf("|-------------------------------------------------------------------------------|\n");
    printf("\t\tChose any Option[1,2,3]\n");
    printf("|-------------------------------------------------------------------------------|\n");
    //You have to chose any following choice
    //registration or status or admin or exit

    int choice;
    printf("\t\tEnter Your Choice : ");
    scanf("%d",&choice);



    switch(choice)
    {
    case 1:
        regestration();
        break;
    case 2:
       // status();
        break;
    case 3:
        admin_panel();
        break;
    case 4:
        close();
        break;
    default :
    printf("\n\t\t Invalid choice. Please try again\n");
    }

}

int saving_in_file(struct vaccine x)
{
    FILE *file;
    file =fopen("vaccine database.txt","a");

    if(file==NULL)
    {
        printf("File does not exit\n");
    }
    else
    {
        fclose(file);
        file=fopen("vaccine database.txt","a");
        printf("File is opened\n");
       fprintf(file,"%s\n",x.national_ID);


       fprintf(file,"%s",x.name);
       fprintf(file,"%s\n",x.gender);
       fprintf(file,"%s",x.blood_group);
       fprintf(file,"%d/%d/%d\n",x.birth_day,x.birth_month,x.birth_year);
       fprintf(file,"Yes\n");

       fprintf(file,"%d\n",x.vaccine_type);


    fclose(file);

    }

}

int main()
{

    //menu is bar will take you regestraion, or status or admin panel
    menu();

    return 0;
}
