#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#define SIZE 10

struct Student_type
{
	char name[10];
	int num;
	int age;
	char addr[15];
}stud[SIZE]; //定义全局结构体数组stud，包含10个学生数据

void save() //定义函数save，向文件输出SIZE个学生的数据
{
	FILE *fp;
	int i;
	if((fp=fopen("test.txt","wb"))==NULL) //打开输出文件
	{
		printf("cannot open file\n");
		return;
	}
	for(i=0;i<SIZE;i++)
	if(fwrite(&stud[i],sizeof(struct Student_type),1,fp)!=1)
		printf("file write error\n");
	fclose(fp);
}


int main(int argc, char *argv[]) {
	/*
	//读写字符
	FILE *fp; //定义文件指针fp
	char ch,filename[10];
	
	printf("请输入所用的文件名： ");
	scanf("%s",filename);//输入文件名
	getchar();  //用来消化最后输入的回车符
	
	if((fp=fopen(filename,"w"))==NULL) //打开输出文件并使fp指向此文件
	{
		printf("cannot open file\n"); //如果打开出错就输出打不开
		exit(0); //终止程序
	}
	printf("请输入一个准备存储到磁盘的字符串（以#结束）：");
	ch=getchar(); //接受从键盘输入的第一个字符
	while(ch!='#') //当输入#时结束循环
	{
		fputc(ch,fp); //向磁盘文件输出一个字符
		putchar(ch); //将输出的字符显示在屏幕上
		ch=getchar(); //再接受从键盘输入的一个字符
	}
	fclose(fp);
	putchar(10); //向屏幕输出一个换行符
	*/
	
	
	/*
	FILE *in,*out; //定义指向FILE类型文件的指针变量
	char ch,infile[10],outfile[10]; //定义两个字符数组，分别存放两个数据文件名
	
	printf("输入读入文件的名字：");
	scanf("%s",infile); //输入一个输入文件的名字
	printf("输入输出文件的名字：");
	scanf("%s",outfile);
	
	if((in=fopen(infile,"r"))==NULL) //打开输入文件
	{
		printf("无法打开此文件\n");
		exit(0);
	}
	if((out=fopen(outfile,"w"))==NULL) //打开输出文件
	{
		printf("无法打开此文件\n");
		exit(0);
	}
	
	ch=fgetc(in); //从输入文件读入一个字符，赋给变量ch
	while(!feof(in)) //如果未遇到输入文件的结束标志
	{
		fputc(ch,out); //将ch写到输出文件
		putchar(ch); //将ch显示到屏幕上
		ch=fgetc(in); //再从输入文件读入一个字符，赋给变量ch
	}
	putchar(10); //显示完全部字符后换行
	fclose(in); //关闭输入文件
	fclose(out); //关闭输出文件
	*/
	
	
	/*
	FILE *fp; 
	char str[3][10],temp[10]; //str是用来存放字符串的二维数组，temp是临时数组
	int i,j,k,n=3;
	printf("Enter strings:\n"); //提示输入字符串
	
	for(i=0;i<n-1;i++)
		gets(str[i]); //输入字符串
	
	for(i=0;i<n-1;i++) //用选择法对字符串排序
	{
		k=i;
		for(j=i+1;j<n;j++)
			if(strcmp(str[k],str[j])>0) k=j;
		if(k!=i)
		{
			strcpy(temp,str[i]);
			strcpy(str[i],str[k]);
			strcpy(str[k],temp);
		}
	}
	
	if((fp=fopen("test.txt","w"))==NULL) //打开磁盘文件
	{
		printf("can't open file!\n");
		exit(0);
	}
	printf("\nThe new sequence:\n");
	for(i=0;i<n;i++)
	{
		fputs(str[i],fp);fputs("\n",fp); //向磁盘文件写一个字符串，然后输出一个换行符
		printf("%s\n",str[i]); //在屏幕上显示
	}
	*/
	
	
	// 用二进制方式向文件读写数据
	/*
	int i;
	printf("Please enter data of students:\n");
	for(i=0;i<SIZE;i++) //输入SIZE个学生的数据，存放在数组stud中
	scanf("%s%d%d%s",stud[i].name,&stud[i].num,&stud[i].age,stud[i].addr);
	save();
	*/
	
	/*
	int i; 
	FILE *fp;
	if((fp=fopen("test.txt","rb"))==NULL) //打开输入文件test.txt
	{
		printf("cannot open file\n");
		exit(0);
	}
	for(i=0;i<SIZE;i++)
	{
		fread(&stud[i],sizeof(struct Student_type),1,fp); //从fp指向的文件读入一组数据
		printf("%-10s %4d %4d %-15s\n",stud[i].name,stud[i].num,stud[i].age,stud[i].addr); //在屏幕上输出这组数据
	}
	fclose(fp); //关闭文件
	*/
	
	
	/*
	//随机读取数据文件
	FILE *fp1,*fp2;
	char ch;
	fp1=fopen("out.c","r"); //打开输入文件
	fp2=fopen("test.txt","w"); //打开输出文件
	
	ch=getc(fp1); //从out.c文件读入第一个字符
	while(!feof(fp1)) //当未读取文件尾标志
	{
		putchar(ch); //在屏幕输出一个字符
		ch=getc(fp1); //再从out.c文件读入一个字符
	}
	
	putchar(10); //在屏幕执行换行
	rewind(fp1); //使文件位置标记返回文件开头
	ch=getc(fp1); //从out.c文件读入第一个字符
	while(!feof(fp1)) //当未读取文件尾标志
	{
		fputc(ch,fp2); //向test.txt文件输出一个字符
		ch=fgetc(fp1); //再从out.c文件读入一个字符
	}
	fclose(fp1);fclose(fp2);
	*/
	
	
	/*
	int i;
	FILE *fp; 
	if((fp=fopen("test.txt","rb"))==NULL) //以只读方式打开二进制文件
	{
		printf("cannot open file\n");
		exit(0);
	}
	for(i=0;i<10;i+=2)
	{
		fseek(fp,i*sizeof(struct Student_type),0); //移动文件位置标记
		fread(&stud[i],sizeof(struct Student_type),1,fp); //读一个数据块到结构体变量
		printf("%-10s %4d %4d %-15s\n",stud[i].name,stud[i].num,stud[i].age,stud[i].addr); //在屏幕输出
	}
	fclose(fp);
	*/
	
	
	/*
	FILE *fp;
	char str[100];
	int i=0;
	if((fp=fopen("out.c","w"))==NULL)
	{
		printf("can not open file\n");
		exit(0);
	}
	printf("input a string:\n");
	gets(str);
	while(str[i]!='!')
	{
		if(str[i]>='a'&&str[i]<='z')
			str[i]=str[i]-32;
		fputc(str[i],fp);
		i++;
	}
	fclose(fp);
	fp=fopen("out.c","r");
	fgets(str,strlen(str)+1,fp);
	printf("%s\n",str);
	fclose(fp);
	*/
	
	
	FILE *fp;
	int i,j,n,il;
	char c[100],t,ch;
	
	if((fp=fopen("test.c","r"))==NULL)
	{
		printf("\ncan not open file\n");
		exit(0);
	}
	printf("file A:\n");
	for(i=0;(ch=fgetc(fp))!=EOF;i++)
	{
		c[i]=ch;
		putchar(c[i]);
	}
	fclose(fp);

	il=i;
	if((fp=fopen("out.c","r"))==NULL)
	{
		printf("\ncan not open file\n");
		exit(0);
	}
	printf("\nfile B:\n");
	for(;(ch=fgetc(fp))!=EOF;i++)
	{
		c[i]=ch;
		putchar(c[i]);
	}
	fclose(fp);

	n=i;
	for(i=0;i<n-1;i++)
	{
		for(j=0;j<n-1-i;j++)
		{
			if(c[j]>c[j+1])
			{
				t=c[j];
				c[j]=c[j+1];
				c[j+1]=t;
			}
		}
	}
	
	printf("\nfile C:\n");
	fp=fopen("test.txt","w");
	for(i=0;i<n;i++)
	{
		putc(c[i],fp);
		putchar(c[i]);
	}
	fclose(fp);
}