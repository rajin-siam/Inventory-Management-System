#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include<stdbool.h>
struct vaccine {
   char national_ID[100];
   char name[100];
   char gender[10];
   char blood_group[10];
   int birth_day;
   int birth_month;
   int birth_year;
   bool eligibility;
   char phone_number[20];
   char password[100];
   int vaccine_type;
};

int file_writing(struct vaccine inp1)
{
    FILE *of;
   of= fopen ("c1.txt", "ab");
   if (of == NULL) {
      fprintf(stderr, "\nError to open the file\n");
      exit (1);
   }
   int j=0;
   fwrite (&inp1, sizeof(inp1), 1, of);


 //  fwrite (&inp1[0], sizeof(struct Student), 1, of);
   if(fwrite != 0)
      printf("Contents to file written successfully !\n");
   else
      printf("Error writing file !\n");
   fclose (of);
}

int file_reading()
{

            FILE *inf;
           struct vaccine inp[100];
           inf = fopen ("c1.txt", "rb");
           if (inf == NULL) {
              fprintf(stderr, "\nError to open the file\n");
              exit (1);
           }
           int i=0;
           while(fread(&inp[i], sizeof(inp[i]), 1, inf))
           {
                    if(feof(inf))break;
                        i++;
           }
           printf("%d\n",i);
           fclose (inf);

}

int show_database()
{
    FILE *inf;
           struct vaccine inp[100];
           inf = fopen ("c1.txt", "rb");
           if (inf == NULL) {
              fprintf(stderr, "\nError to open the file\n");
              exit (1);
           }
           int i=0,v1=0,v2=0,v3=0;
           while(fread(&inp[i], sizeof(inp[i]), 1, inf))
           {
                    if(feof(inf))break;


                     printf("%s|%-25s|%s|%s|%2d/%2d/%4d|%s|%16s|%d\n",inp[i].national_ID, inp[i].name,inp[i].gender,
                            inp[i].blood_group,inp[i].birth_day,inp[i].birth_month,inp[i].birth_year,
                            inp[i].phone_number,inp[i].password,inp[i].vaccine_type);
                     if(inp[i].vaccine_type==1)v1++;
                else if(inp[i].vaccine_type==2)v2++;
                else if(inp[i].vaccine_type==3)v3++;
                        i++;
           }
           printf("%d\n",i);
           fclose (inf);

           printf("1.Phizer =%d\n2.Shinopharm =%d\n3.Astrozeneka %d\n",v1,v2,v3);


}

/********************************   prototype   *********************************************/


int regestration();
int beautyfy();
bool phone_number_checker(char s[]);
int spaceing(int,int );
int printing_string(char s[]);
int saving_in_file(struct vaccine x);
bool check_birth_digit(char s[]);
int check_age_elegibility(int day,int month, int year);
int menu();
char *buffer_function(char *);
char input_nationl_ID(char *);
char input_name(char *);
char input_gender(char *);
char input_blood_group(char *);
char input_phone_number(char *);
char input_password(char *);
int Editing_user_data();
/********************************   prototype   **********************************************/



int main()
{
    menu();
}



/****************************************   function defi   ***************************************/

int regestration () {

    char buffer[100];
    struct vaccine x={"","","","",0,0,0,true,"","",0};
        input_nationl_ID(&x.national_ID);
        fflush(stdin);
        input_name(&x.name);
        fflush(stdin);
        input_gender(&x.gender);
        input_blood_group(&x.blood_group);
            fflush(stdin);
            printf("|...........................Enter your Birth date : \n");
            printf("|...........................Birth day   : ");scanf("%d",&x.birth_day);
            printf("\n|...........................Birth month : ");scanf("%d",&x.birth_month);
            printf("\n|...........................Birth year : ");scanf("%d",&x.birth_year);
            system("cls");
                if(true)
                {
                    x.eligibility=true;printf("You are eligible for vaccination\n");
                }
                else {
                    x.eligibility=false;printf("You are not eligible for vaccination\n");
                    }

                printf("Enter your phone Number And Password\n");

                input_phone_number(&x.phone_number);

                printf("\nPassword     : ");scanf("%s",x.password);
                printf("\n............................Which vaccine do You want \n: ");
                printf("1.Phizer 2.Shinopharm 3.Astrozeneka : ");
                printf("chose............................ : ");scanf("%d",&x.vaccine_type);

   file_writing(x);
   file_reading();


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

int menu()
{   beautyfy();
    printf("|-------------------------------------------------------------------------------|\n");
    printf("|----------------------------------Covid Vaccine Bd-----------------------------|\n");
    printf("|-------------------------------------------------------------------------------|\n");
    beautyfy();
    printf("\t\t\t 1. Covid Vaccine Regestration\n");
    printf("\t\t\t 2. Admin Panel\n");
    printf("\t\t\t 3. Edit user information\n");
    printf("\t\t\t 4. Exit\n");
    printf("\n\n");
    printf("|-------------------------------------------------------------------------------|\n");
    printf("\t\tChose any Option[1,2,3,4]\n");
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
                case 3:Editing_user_data();break;
                case 4:
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
int admin_panel()
{
    printf("ADMIN\n");
       show_database();
}
int Editing_user_data()
{
    printf("User data edition");
    FILE *inf;
               struct vaccine inp[100];
               inf = fopen ("c1.txt", "rb");
               if (inf == NULL) {
                  fprintf(stderr, "\nError to open the file\n");
                  exit (1);
               }

               int i=0,j;
               while(fread(&inp[i], sizeof(inp[i]), 1, inf))
               {
                        if(feof(inf))break;
                            i++;
               }printf("%d\n",i);
               fclose (inf);

               printf("Enter the national ID & password\n");
               char s[100];char s2[100];
               scanf("%s",s);
               scanf("%s",s2);
               bool flag=true;

            for(j=0;j<i;j++)
               {
                   if(strcmp(inp[j].national_ID,s)==0){flag=true;break;}
                   else flag=false;
               }

               if(flag==true)
               {
                   if(strcmp(inp[j].password,s2)==0)flag=true;
                   else flag=false;
               }


                if(flag==true)
               {
                   int ch=-1;
                       while(ch!=0)
                        {
                                       printf("[To Edit Name enter          1.]\n");
                                       printf("[To Edit Gender enter        2.]\n");
                                       printf("[To Edit Blood Group enter   3.]\n");
                                       printf("[To Edit Phone Number enter  4.]\n");
                                       printf("[To Edit Password enter      5.]\n");
                                       printf("[To Edit vaccine type enter  6.]\n");
                                       printf("[To Exit enter               0.]\n");
                           scanf("%d",&ch);
                           fflush(stdin);
                           if(ch==1)input_name(&inp[j].name);
                           else if(ch==2)input_gender(&inp[j].gender);
                           else if(ch==3)input_blood_group(&inp[j].blood_group);
                           else if(ch==4)input_phone_number(&inp[j].phone_number);
                           else if(ch==5)input_password(&inp[j].password);
                           else if(ch==6)scanf("%d",&inp[j].vaccine_type);
                           else if(ch==0)break;
                       }
               }
            if(flag==true)
            {
            FILE *del;
            del=fopen("c1.txt","w");
            remove("c1.txt");
            fclose(del);
            for(j=0;j<i;j++)
            file_writing(inp[j]);
            }

}



char *buffer_function(char *buffer )
{
            int l=strlen(buffer);
            if(buffer[l-1]=='\n')buffer[l-1]='\0';
            return buffer;
}

char input_nationl_ID(char *ID)
{
     while(true)
    {
        printf("............................Input National ID : ");
        scanf("%s",ID);
        if(true==check_birth_digit(ID))break;
        else printf("Birth digit is in-correct...Try again\n");
    }
}

char input_name(char *name)
{
    char buffer[100];
    printf("............................Input Name : ");
    fgets(buffer,70,stdin);
    strcpy(name,buffer_function(&buffer));
}

char input_gender(char *gender)
{
            char buffer[100];
            printf("|...........................Input Gender : ");
            fgets(buffer,70,stdin);
            strcpy(gender,buffer_function(&buffer));
}

char input_blood_group(char *blood)
{
    char buffer[100];
    printf("|...........................Input Blood Group : ");
    fgets(buffer,70,stdin);
    strcpy(blood,buffer_function(&buffer));
}

char input_phone_number(char *number)
{
    char buffer[100];
                    while(1)
                    {
                    printf("Phone Number : ");scanf("%s",buffer);
                    strcpy(number,buffer_function(&buffer));
                    if(phone_number_checker(number)==true)break;
                    else printf("Wrong number. Try again\n");
                    }
}
char input_password(char *pass)
{
    printf("Password : ");scanf("%s",pass);
}
