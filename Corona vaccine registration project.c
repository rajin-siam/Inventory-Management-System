#include <stdio.h>
#include <stdlib.h>
#include<stdbool.h>
struct vaccine
{
    char name[100];
    char national_ID[100],gender[4],blood_group[8];
    char address[100];
    bool eligibility;
    char phone_number[100];
    int birth_day,birth_month,birth_year;
    int vaccine_type;
    char password[100];
};
struct userdata{
    char s[100][100];
};
int beautyfy();
bool phone_number_checker(char s[]);
int spaceing(int,int );
int printing_string(char s[]);
int saving_in_file(vaccine);
bool check_birth_digit(char s[]);
int check_age_elegibility(int day,int month, int year);
int menu();
int regestration();
void admin_panel();

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
        fprintf(file,"%s\n",x.national_ID);
        fprintf(file,"%s",x.name);
        fprintf(file,"%s\n",x.gender);
        fprintf(file,"%s",x.blood_group);
        fprintf(file,"%d/%d/%d\n",x.birth_day,x.birth_month,x.birth_year);
        fprintf(file,"Yes\n");
        fprintf(file,"%s\n",x.phone_number);
        fprintf(file,"%s\n",x.password);
        fprintf(file,"%d\n",x.vaccine_type);
        fclose(file);
    }
}

int main()
{
    system("COLOR 0A");
    menu();
    return 0;
}

int spacing (int index,int n)
{
    int space;
    if(n==0)space =21-index;
    else if(n==1)space =35-index;
    else if(n==2)space =6-index;
    else if(n==3)space =11-index;
    else if(n==4)space=13-index;
    else if(n==6)space =12-index;
    else if(n==8)space=11;
    for(int i=0;i<space;i++)printf(" ");
    printf("|");
    }

int printing_string(char s[])
{
    int i=0;
    int index=0;
    for(i=0;s[i]!='\0'&& s[i]!='\n';i++)
    {
        printf("%c",s[i]);
        if(s[i+1]=='\n')return i+1;
    }
}


bool check_birth_digit(char s[])
{
    int l=strlen(s);
    bool sign;
    if(l==17)sign=true;
    else
        return false;
    for(int i=0;i<l;i++)
    {
        if(isdigit(s[i])!=0)sign=true;
        else
            return false;
    }
    return sign;
}

int check_age_elegibility(int day,int month,int year)
{
    bool eligible=false;
    if(2021-year>=18)eligible=true;
    else return false;
    if(eligible==true)
    {
        if(month-1>=0)eligible=true;
        else return false;
        if(day-1>=0)eligible=true;
        else eligible=false;
    }
    return eligible;
}

int regestration()
{
            system("cls");                                                  ////at first in this panel you will fill these fields
            struct vaccine x;                                               //national id//name//gender
            while(true)                                                     //blood group
            {                                                               //date of birth(day,month,year)
        printf("............................Input National ID : ");         //then you will check eligibility
        scanf("%s",x.national_ID);                                          //if the person is eligible you will
        if(true==check_birth_digit(x.national_ID))break;                    //tell him to chose vaccine.
        else printf("Birth digit is in-correct...Try again\n");
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
    system("cls");
    beautyfy();printf("\n\nPLEASE WAIT FOR FURTHER CONFIRMATION\n\n");beautyfy();
    bool check=check_age_elegibility(x.birth_day,x.birth_month,x.birth_year);
    if(check==true)
    {
        x.eligibility=true;printf("You are eligible for vaccination\n");
    }
    else {
        x.eligibility=false;printf("You are not eligible for vaccination\n");
        }
    if(check==true)
    {
        printf("Enter your phone Number and password\n");
        while(1)
        {
        printf("Phone Number : ");scanf("%s",x.phone_number);
        if(phone_number_checker(x.phone_number)==true)break;
        }
        printf("\nPassword     : ");scanf("%s",x.password);
        printf("\n............................Which vaccine do You want \n: ");
        printf("1.Phizer 2.Shinopharm 3.Astrozeneka : ");
        printf("chose............................ : ");scanf("%d",&x.vaccine_type);
        saving_in_file(x);
    }
}
void admin_panel()
{
    system("cls");
    FILE *file2;
    file2=fopen("vaccine database.txt","r");
    char data[100][1000];
    int i=0;
    while(fgets(data[i],sizeof(data[i]),file2))
    {
        i++;
    }
    int n=i+1;
    int j;
    fclose(file2);
    struct userdata a[100];
    for(i=0,j=0;i<n;i++)
    {
        strcpy(a[i/9].s[i%9],data[i]);
    }
    printf("National Id          |                  Name             |Gender|Blood Group|date of birth|Phone Number|vaccine Type|\n");
    for(i=0;i<n;i++)
    {
        if(i%9==7||i%9==5)continue;
        int index=printing_string(a[i/9].s[i%9]);
        spacing(index,i%9);if(i%9==8)printf("\n");
    }
    printf("                                   |      |           |             |            |            |\n");
    int shino=0,astro=0,phi=0;
    for(i=0;i<n;i+=9)
    {
        if(a[i/9].s[8][0]=='1')phi++;
        else if(a[i/9].s[8][0]=='2')shino++;
        else if(a[i/9].s[8][0]=='3')astro++;
    }
    printf("Number of shinopharm vaccine = %d\n",shino);
    printf("Number of phizer vaccine = %d\n",phi);
    printf("Number astrozeneka vaccine =%d\n",astro);
}


int menu()
{   beautyfy();
    printf("|-------------------------------------------------------------------------------|\n");
    printf("|----------------------------------Covid Vaccine Bd-----------------------------|\n");
    printf("|-------------------------------------------------------------------------------|\n");
    beautyfy();
    printf("\t\t\t 1. Covid Vaccine Regestration\n");
    printf("\t\t\t 2. Admin Panel\n");
    printf("\t\t\t 3. Exit\n");
    printf("\n\n");
    printf("|-------------------------------------------------------------------------------|\n");
    printf("\t\tChose any Option[1,2,3]\n");
    printf("|-------------------------------------------------------------------------------|\n");
    int choice;
    printf("\t\tEnter Your Choice : ");
    char admin_panel_password[]={"corona_vaccine\0"};
     bool sign=false;
            scanf("%d",&choice);
            switch(choice)
            {
            case 1:
                regestration();break;
            case 2:
                while(1)
                {
                    printf("Enter Password : \n");
                    char password[100];
                    fflush(stdin);
                    fgets(password,100,stdin);
                    int l=strlen(password);
                    password[l-1]='\0';
                    l=strlen(password);
                    if(strcmp(admin_panel_password,password)==0)
                    {
                        sign=true;break;
                    }
                    else if(strcmp(password,"exit")==0)break;
                    else sign=false;
                }
                if(sign==true)admin_panel();break;
            case 3:
                return 0;
            default :
            printf("\n\t\t Invalid choice. Please try again\n");
            }
}
int beautyfy()
{
    for(int i=0;i<100;i++)
        printf(".");
        for(int j=0;j<10000;j++)
            for(int k=0;k<10000;k++)
            {
                    ;
            }
            printf("\n");
}
bool phone_number_checker(char s[])
{
    int l=strlen(s);
    bool sign;
    if(l==11)sign=true;
    else
        return false;
    for(int i=0;i<l;i++)
    {
        if(isdigit(s[i])!=0)sign=true;
        else
            return false;
    }
    return sign;
}
