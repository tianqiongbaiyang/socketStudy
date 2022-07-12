#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <curses.h>

int main(int argc, char *argv[]) {
	/*
	//通过指针变量访问整型变量
	int a=100,b=10; //定义整形变量a,b,并初始化
	int *pointer_1,*pointer_2; //定义指向整型数据的指针变量pointer_1,pointer_2
	pointer_1=&a; //把变量a的地址赋给指针变量pointer_1
	pointer_2=&b; //把变量b的地址赋给指针变量pointer_2
	printf("a=%d,b=%d\n",a,b); //输出变量a和b的值
	printf("*pointer_1=%d,*pointer_2=%d\n",*pointer_1,*pointer_2); //输出变量a和b的值
	*/
	
	
	/*
	//由大到小输出a,b值
	int *p1,*p2,*p,a,b; //p1,p2的类型是int*类型
	printf("please enter two integer numbers:");
	scanf("%d,%d",&a,&b); //输入两个整数
	p1=&a; //使p1指向变量a
	p2=&b; //使p2指向变量b
	if(a<b) //如果a<b
	{
		p=p1;p1=p2;p2=p; //使p1与p2的值互换
	}
	printf("a=%d,b=%d\n",a,b); //输出a,b
	printf("max=%d,min=%d\n",*p1,*p2); 
	*/
	
	
	/*
	// 通过指针作形参由大到小输出a,b值
	void swap(int *p1,int *p2); //对swap函数的声明
	int a,b;
	int *pointer_1,*pointer_2; //定义两个int*型的指针变量
	printf("please enter a and b:");
	scanf("%d,%d",&a,&b); //输入两个整数
	
	pointer_1=&a; //使pointer_1指向a
	pointer_2=&b; //使pointer_2指向b
	if(a<b) swap(pointer_1,pointer_2); //如果a<b,调用swap函数
	printf("max=%d,min=%d\n",a,b); //输出结果
	*/
	
	
	/*
	// 由大到小排序
	void exchange(int *q1,int *q2,int *q3); //函数声明
	int a,b,c,*p1,*p2,*p3;
	printf("please enter three numbers:");
	scanf("%d,%d,%d",&a,&b,&c);
	
	p1=&a;p2=&b;p3=&c; 
	exchange(p1,p2,p3);
	printf("The order is: %d,%d,%d\n",a,b,c);
	*/
	
	
	/*
	//通过下标法输出数组元素
	int a[10],i;
	printf("please enter 10 integer numbers:");
	
	for(i=0;i<10;i++)
		scanf("%d",&a[i]);
	
	for(i=0;i<10;i++)
		printf("%d ",a[i]); //数组元素用数组名和下标表示
	*/
	
	
	/*
	//通过数组名输出数组元素
	int a[10],i;
	printf("please enter 10 integer numbers:");
	
	for(i=0;i<10;i++)
		scanf("%d",&a[i]);
	for(i=0;i<10;i++)
		printf("%d ",*(a+i)); //通过数组名和元素序号计算元素地址，再找到该元素
	printf("\n");
	*/
	
	
	/*
	//通过指针变量输出数组元素
	int a[10],*p,i;
	printf("please enter 10 integer numbers:");
	
	for(i=0;i<10;i++)
		scanf("%d",&a[i]);
	for(p=a;p<(a+10);p++) //用指针指向当前的数组元素
		printf("%d ",*p);
	*/
	
	
	/*
	//通过指针进行数组元素赋值
	int i,a[10],*p=a; //p的初值是a,p指向a[0]
	printf("please enter 10 integer numbers:");
	for(i=0;i<10;i++)
		scanf("%d",p++);
	p=a; //重新使p指向a[0]
	for(i=0;i<10;i++,p++)
		printf("%d ",*p);
	*/
	
	
	/*
	//通过数组名进行数组元素反序排放
	void inv(int x[], int n); //inv函数声明
	int i,a[10]={3,7,9,11,0,6,7,5,4,2};
	printf("The original array:\n");
	for(i=0;i<10;i++)
		printf("%d ",a[i]); //输出未交换时数组各元素的值
	printf("\n");
	
	inv(a,10); //调用inv函数，进行交换
	printf("The array has been inverted:\n");
	
	for(i=0;i<10;i++)
		printf("%d ",a[i]); //输出交换后数组各元素的值
	*/
	
	
	/*
	//通过指针变量进行数组元素反序排放，数组名作实参
	void inv(int *x,int n);
	int i,a[10]={3,7,9,11,0,6,7,5,4,2};
	printf("The original array:\n");
	for(i=0;i<10;i++)
		printf("%d ",a[i]);
	printf("\n");
	
	inv(a,10);
	printf("The array has been inverted:\n");
	for(i=0;i<10;i++)
		printf("%d ",a[i]);
	return 0;
	*/
	
	
	/*
	//通过指针变量进行数组元素反序排放，指针变量作实参
	void inv(int *x,int n); //inv函数声明
	int i,arr[10],*p=arr; //指针变量p指向arr[0]
	printf("The original array:\n");
	for(i=0;i<10;i++,p++)
		scanf("%d",p); //输入arr数组的元素
	printf("\n");
	
	p=arr; //指针变量p重新指向arr[0]
	inv(p,10); //调用inv函数，实参p是指针变量
	printf("The array has been inverted:\n");
	for(p=arr;p<arr+10;p++)
		printf("%d ",*p);
	*/
	
	
	/*
	//用指针方法排序
	void sort(int x[],int n); //sort函数声明
	int i,*p,a[10]; 
	p=a; //指针变量p指向a[0]
	printf("please enter 10 integer numbers:");
	for(i=0;i<10;i++)
		scanf("%d",p++); //输入10个整数
	p=a; //指针变量p重新指向a[0]
	sort(p,10);
	for(p=a,i=0;i<10;i++)
	{
		printf("%d ",*p); //输出排序后的10个数组元素
		p++;
	}
	*/
	
	
	/*
	// 输出元素值
	int a[3][4]={1,3,5,7,9,11,13,15,17,19,21,23};
	int *p; //p是int *型指针变量
	for(p=a[0];p<a[0]+12;p++) //使p依次指向下一个元素
	{
		if((p-a[0])%4==0) printf("\n"); //p移动4次后换行
		printf("%4d",*p); //输出p指向的元素的值
	}
	*/
	
	
	/*
	//输出指定行和列元素值
	int a[3][4]={1,3,5,7,9,11,13,15,17,19,21,23}; //定义二维数组a并初始化
	int (*p)[4],i,j; //指针变量p指向包含4个整型元素的一维数组
	p=a; //p指向二维数组的0行
	printf("please enter row and column:");
	scanf("%d,%d",&i,&j); //输入要求输出的元素的行列号
	printf("a[%d,%d]=%d\n",i,j,*(*(p+i)+j)); //输出a[i][j]的值
	*/
	
	/*
	int a[4]={1,3,5,7}; //定义一维数组a，包含4个元素
	int (*p)[4]; //定义指向包含4个元素的一维数组的指针变量中
	p=&a;  //使p指向一维数组
	printf("%d\n",(*p)[3]); //输出a[3],输出整数7
	*/
	
	
	/*
	void average(float *p,int n);
	void search(float (* p)[4],int n);
	
	float score[3][4]={{65,67,70,60},{80,87,90,81},{90,99,100,98}};
	average(* score, 12); //求12个分数的平均分
	search(score,2); //求序号为2的学生的成绩
	*/
	
	
	/*
	// 输出存在不及格分数人的所有成绩
	void search(float (* p)[4],int n); //函数声明
	float score[3][4]={{65,57,70,60},{58,87,90,81},{90,99,100,98}}; //定义二维数组函数score
	search(score,3); //调用search函数
	*/
	
	
	/*
	//通过字符数组输出字符串
	char string[] = "I love China!"; //定义字符数组string
	printf("%s\n",string); //用%s格式声明输出string，可以输出整个字符串
	printf("%c\n",string[7]); //用%c格式输出一个字符数组元素
	
	//通过字符指针变量输出字符串
	char * test="I love China!";  //定义字符指针变量string并初始化
	printf("%s\n",test); //输出字符串
	*/
	
	
	/*
	//复制字符串
	char a[]="I am a student.",b[20]; //定义字符数组
	int i;
	for(i=0;* (a+i)!='\0';i++)
		* (b+i)=* (a+i); //将a[i]的值赋给b[i]
	* (b+i)='\0';  //在b数组的有效字符之后加'\0'
	printf("string a is:%s\n",a); //输出a数组中全部有效字符
	
	printf("string b is:");
	for(i=0;b[i]!='\0';i++)
		printf("%c",b[i]); //逐个输出b数组中全部有效字符
	printf("\n");
	
	
	//通过指针变量复制字符串
	char c[]="I am a boy.",d[20],*p1,*p2;
	p1=c;p2=d; //p1,p2分别指向a数组和b数组中的第一个元素
	for(;*p1!='\0';p1++,p2++) //p1,p2每次自加1
		*p2=*p1; //将p1所指向的元素的值赋给p2所指向的元素
		*p2='\0'; //在复制完全部有效字符后加'\0'
		printf("string c is:%s\n",c); //输出c数组中的字符
		printf("string d is:%s\n",d); //输出d数组中的字符
	*/
	
	
	/*
	//字符数组名作实参
	void copy_string(char from[],char to[]); 
	char a[]="I am a teacher.";
	char b[]="You are a student.";
	printf("string a=%s\nstring b=%s\n",a,b);
	printf("\ncopy string a to string b:\n");
	copy_string(a,b); //用字符数组名作为函数实参
	printf("string a=%s\nstring b=%s\n",a,b); //用字符数组名作为函数实参
	
	//指针变量作实参
	char c[]="I am a teacher"; //定义字符数组c并初始化
	char d[]="You are a student."; //定义字符数组b并初始化
	char *from=c,*to=d; //from指向c数组首元素，to指向d数组首元素
	printf("\nstring c=%s\nstring d=%s\n",c,d);
	printf("\ncopy string c to string d:\n");
	copy_string(from, to); //实参为字符数组指针变量
	printf("string c=%s\nstring b=%s\n",c,d);
	printf("\n");
	
	//字符指针变量作形参和实参
	void copy_string2(char *from,char *to);
	char *e="I am a teacher."; //e是char*型指针变量
	char f[]="You are a student."; //f是字符数组
	char *p=f; //使指针变量p指向b数组首元素
	printf("string e=%s\nstring f=%s\n",e,f); //输出e串和f串
	printf("\ncopy string e to string f:\n");
	copy_string2(e,p); //调用copy_string函数，实参为指针变量
	printf("string e=%s\nstring f=%s\n",e,f); //输出改变后的e串和f串
	*/
	
	
	/*
	//改变指针变量的值
	char *a="I love China!";
	a=a+7; //改变指针变量的值，即改变指针变量的指向
	printf("%s\n",a); //输出从a指向的字符开始的字符串
	*/
	
	
	/*
	//通过函数名调用函数
	int max(int,int); //函数声明
	int a,b,c;
	printf("please enter a and b:");
	
	scanf("%d,%d",&a,&b);
	c=max(a,b); //通过函数名调用max函数
	printf("a=%d\nb=%d\nmax=%d\n",a,b,c);
	
	//通过指针变量调用它所指向的函数
	int (*p)(int,int); //定义指向函数的指针变量p
	int e,f,d;
	p=max; //使p指向max函数
	printf("please enter e and f:");
	scanf("%d,%d",&e,&f);
	d=(*p)(e,f); //通过指针变量调用max函数
	printf("e=%d\nf=%d\nmax=%d\n",e,f,d);
	*/
	
	
	/*
	int max(int,int); //函数声明
	int min(int x,int y); //函数声明
	int (*p)(int,int); //定义指向函数的指针变量
	int a,b,c,n;
	
	printf("please enter a and b:");
	scanf("%d,%d",&a,&b);
	printf("please choose 1 or 2:");
	scanf("%d",&n); //输入1或2
	
	if(n==1) p=max; //如输入1，使p指向max函数
	else if(n==2) p=min; //如输入2，使p指向min函数
	c=(*p)(a,b); //调用p指向的函数
	
	printf("a=%d,b=%d\n",a,b);
	if(n==1) printf("max=%d\n",c); 
	else printf("min=%d\n",c); 
	*/
	
	
	/*
	void fun(int x,int y,int (*p)(int,int)); //fun函数声明
	int max(int,int);
	int min(int,int);
	int add(int ,int);
	int a=34,b=-21,n;
	
	printf("please choose 1,2 or 3:");
	scanf("%d",&n); //输入1，2或3之一
	
	if(n==1) fun(a,b,max); //输入1时，调用max函数
	else if(n==2) fun(a,b,min); //输入2时调用min函数
	else if(n==3) fun(a,b,add); //输入3时调用add函数
	*/
	
	
	/*
	//输出第i个同学的成绩
	float score[][4]={{60,70,80,90},{56,89,67,88},{34,78,90,66}}; //定义数组，存放成绩
	float *search3(float (*pointer)[4],int n); //函数声明
	float *p;
	int i,k;
	
	printf("enter the number of student:");
	scanf("%d",&k); //输入要找的学生的序号
	printf("The scores of No. %d are:\n",k);
	p=search3(score,k); //调用search函数，返回score[k][0]的地址
	
	for(i=0;i<4;i++)
		printf("%5.2f\t",*(p+i)); //输出score[k][0]~score[k][3]的值
	printf("\n");
	*/
	
	
	/*
	//输出存在不合格成绩同学的所有成绩
	float score[][4]={{60,70,80,90},{56,89,67,88},{34,78,90,66}}; //定义数组，存放成绩
	float *search4(float (*pointer)[4]); //函数声明
	int i,j;
	float *p;
	
	for(i=0;i<3;i++) //循环3次
	{
		p=search4(score+i); //调用search4函数，如有不及格返回score[i][0]的地址，否则返回NULL
		if(p==*(score+i)) //如果返回的是score[i][0]的地址，表示p的值不是NULL
		{
			printf("No. %d score:",i);
			for(j=0;j<4;j++)
				printf("%5.2f ",*(p+j)); //输出score[i][0]~score[i][3]的值
			printf("\n");
		}
	}
	*/
	
	
	/*
	//字符串排序
	void sort2(char *name[],int n); //函数声明
	void print(char *name[],int n); //函数声明
	char *name[]={"Follow me","BASIC","Great Wall","FORTRAN","Computer design"}; //定义指针数组，它的元素分别指向5个字符串
	
	int n=5;
	sort2(name,n); //调用sort函数，对字符串排序
	print(name,n); //调用print函数，输出字符串
	*/
	
	
	/*
	//指向指针数据的指针变量
	char *name[]={"Follow me","BASIC","Great Wall","FORTRAN","Computer design"};
	char **p;
	int i;
	for(i=0;i<5;i++)
	{
		p=name+i;
		printf("%s\n",*p);
	}
	*/
	
	
	/*
	//用指向指针数据的指针变量输出数组元素值
	int a[5]={1,3,5,7,9};
	int *num[5]={&a[0],&a[1],&a[2],&a[3],&a[4]};
	int **p,i;  //p是指向指针型数据的指针变量
	
	p=num;
	for(i=0;i<5;i++) //使p指向num[0]
	{
		printf("%d ",**p);
		p++;
	}
	*/
	
	/*
	//建立动态数组输出不合格成绩
	void check2(int *);  //函数声明
	int *p1,i; //p1是int型指针
	
	p1=(int *)malloc(5*sizeof(int)); //开辟动态内存区，将地址转换成int *型，然后放在p1中
	for(i=0;i<5;i++)
		scanf("%d",p1+i); //输入5个学生的成绩
	check2(p1); //调用check函数
	*/
	
	
	/*
	//整数排序
	void swap2(int *p1,int *p2);
	int n1,n2,n3;
	int *p1,*p2,*p3;
	
	printf("input three integer n1,n2,n3:");
	scanf("%d,%d,%d",&n1,&n2,&n3);
	
	p1=&n1;
	p2=&n2;
	p3=&n3;
	if(n1>n2) swap2(p1,p2);
	if(n1>n3) swap2(p1,p3);
	if(n2>n3) swap2(p2,p3);
	printf("Now,the order is:%d,%d,%d\n",n1,n2,n3);
	*/
	
	
	/*
	//字符串排序
	void swap4(char *,char *);
	char str1[30],str2[31],str3[30];
	
	printf("input three line:\n");
	gets(str1);
	gets(str2);
	gets(str3);
	
	if(strcmp(str1,str2)>0) swap4(str1,str2);
	if(strcmp(str1,str3)>0) swap4(str1,str3);
	if(strcmp(str2,str3)>0) swap4(str2,str3);
	
	printf("Now,the order is:\n");
	printf("%s\n%s\n%s\n",str1,str2,str3);
	*/
	
	
	/*
	//计算字符串长度
	int length(char *p); 
	int len;
	char str[20];
	
	printf("input string: ");
	scanf("%s",str);
	
	len=length(str);
	printf("The length of string is %d.\n",len);
	*/
	
	
	/*
	//字符串部分复制
	void copystr(char *,char *,int);
	int m;
	char str1[20],str2[20];
	
	printf("input string:");
	gets(str1);
	printf("which character that begin to copy?");
	scanf("%d",&m);
	
	if(strlen(str1)<m)
		printf("input error!");
	else 
	{
		copystr(str1,str2,m);
		printf("result:%s\n",str2);
		
	}
	*/
	
	
	/*
	//字符串统计
	int upper=0,lower=0,digit=0,space=0,other=0,i=0;
	char *p,s[20];
	printf("input string: ");
	
	while((s[i]=getchar())!='\n') i++;
	p=&s[0];
	while(*p!='\n')
	{
		if(('A'<=*p) && (*p<='Z'))
			++upper;
		else if(('a'<=*p)&&(*p<='z'))
			++lower;
		else if(*p==' ')
			++space;
		else if((*p<='9') && (*p>='0'))
			++digit;
		else 
			++other;
		p++;
	}
	printf("upper case:%d  lower case:%d   ",upper,lower);
	printf("space:%d  digit:%d  other:%d\n",space,digit,other);
	*/
	
	/*
	//数组转置
	void move2(int *pointer);
	int a[3][3],*p,i;
	
	printf("input matrix:\n");
	for(i=0;i<3;i++)
		scanf("%d %d %d",&a[i][0],&a[i][1],&a[i][2]);
	p=&a[0][0];
	move2(p);
	printf("Now,matrix:\n");
	for(i=0;i<3;i++)
		printf("%d %d %d\n",a[i][0],a[i][1],a[i][2]);
	*/
	
	
	/*
	//逆序排列
	void sort5(int *p,int m);
	int i,n;
	int *p;
	int num[20];
	
	printf("input n:");
	scanf("%d",&n);
	
	printf("please input these numbers:\n");
	for(i=0;i<n;i++)
		scanf("%d",&num[i]);
	p=num;
	sort5(p,n);
	printf("Now,the sequence is:\n");
	for(i=0;i<n;i++)
		printf("%d ",num[i]);
	*/
	
	
	/*
	//字符串比较
	int m;
	char str1[20],str2[20],*p1,*p2;
	int strcmp2(char *p1,char *p2);
	
	printf("input two strings:\n");
	scanf("%s",str1);
	scanf("%s",str2);
	
	p1=&str1[0];
	p2=&str2[0];
	m=strcmp(p1,p2);
	printf("result:%d\n",m);
	*/
	
	
	//输出月份英文名
	char *month_name[13]={"illegal month","January","February","March","April","May","June","July","August","september","October","November","December"};
	int n;
	printf("input month:\n");
	scanf("%d",&n);
	if((n<=12)&&(n>=1))
		printf("It is %s.\n",*(month_name+n));
	else
		printf("It is wrong.\n");
	
	return 0;
	
}

int strcmp2(char *p1,char *p2) //两个字符串比较
{
	int i;
	i=0;
	while(*(p1+i)==*(p2+i))
		if(*(p1+i++)=='\0') return(0);
	return(*(p1+i)-*(p2+i));
}

void sort5(int *p,int m)
{
	int i;
	int temp,*p1,*p2;
	for(i=0;i<m/2;i++)
	{
		p1=p+i;
		p2=p+(m-1-i);
		temp=*p1;
		*p1=*p2;
		*p2=temp;
	}
}

void move2(int *pointer)
{
	int i,j,t;
	for(i=0;i<3;i++)
		for(j=i;j<3;j++)
	{
		t=*(pointer+3*i+j);
		*(pointer+3*i+j)=*(pointer+3*j+i);
		*(pointer+3*j+i)=t;
	}
}

void copystr(char *p1,char *p2,int m) //字符串部分复制函数
{
	int n;
	n=0;
	while(n<m-1)
	{
		n++;
		p1++;
	}
	while(*p1!='\0')
	{
		*p2=*p1;
		p1++;
		p2++;
	}
	*p2='\0';
}

int length(char *p)
{
	int n;
	n=0;
	while(*p!='\0')
	{
		n++;
		p++;
	}
	return(n);
}

void swap4(char *p1,char *p2)
{
	char p[30];
	strcpy(p,p1);
	strcpy(p1,p2);
	strcpy(p2,p);
}

void swap2(int *p1,int *p2)
{
	int p;
	p=*p1;*p1=*p2;*p2=p;
}

void check2(int *p) //定义check函数，形参是int * 指针
{
	int i;
	printf("They are fail:");
	for(i=0;i<5;i++)
		if(p[i]<60) printf("%d ",p[i]); //输出不合格的成绩
}

void sort2(char *name[],int n) //定义sort函数
{
	char *temp;
	int i,j,k;
	for(i=0;i<n-1;i++) //用选择法排序
	{
		k=i;
		for(j=i+1;j<n;j++)
			if(strcmp(name[k],name[j])>0) k=j;
		if(k!=i)
		{
			temp=name[i];name[i]=name[k];name[k]=temp;
		}
	}
}

void print(char *name[],int n) //定义print函数
{
	int i;
	for(i=0;i<n;i++)
		printf("%s\n",name[i]); //按指针数组元素的顺序输出它们所指向的字符串
}

float *search4(float (*pointer)[4]) //定义函数，形参pointer是指向一维数组的指针变量
{
	int i=0;
	float *pt;
	pt=NULL; //先使pt的值为NULL
	for(;i<4;i++)
		if(*(*pointer +i)<60) pt=*pointer; //如果有不及格课程，使pt指向score[i][0]
	return(pt);
}

float *search3(float (*pointer)[4],int n) //形参pointer是指向一维数组的指针变量
{
	float *pt;
	pt=*(pointer+n); //pt的值是&score[k][0]
	return(pt);
}

void fun(int x,int y,int (*p)(int,int)) //定义fun函数
{
	int result; 
	result=(*p)(x,y);
	printf("%d\n",result); //输入结果
	
}

int add(int x,int y)
{
	int z;
	z=x+y;
	printf("sum=");
	return(z);
}

int max(int x,int y) //定义max函数
{
	int z;
	if(x>y) z=x;
	else z=y;
	return(z);
}

int min(int x,int y)
{
	int z;
	if(x<y) z=x;
	else z=y;
	return(z);
}

void copy_string2(char *from,char *to) //定义函数，形参为字符指针变量
{
	for(;*from!='\n';from++,to++)
	{
		*to=*from;
	}
	*to='\0';
}

void copy_string(char from[],char to[]) //形参为字符数组
{
	int i=0;
	while(from[i]!='\0')
	{
		to[i]=from[i];
		i++;
	}
	to[i]='\0';
}

void search(float (* p)[4],int n) //形参p是指向包含4个float型元素的一维数组的指针变量
{
	int i,j,flag;
	for(j=0;j<n;j++)
	{
		flag=0;
		for(i=0;i<4;i++)
			if(* (* (p+j)+i)<60) flag=1; //* (* (p+j)+i)就是score[j][i]
		if(flag==1)
		{
			printf("No.%d fails,his scores are: \n",j+1);
			for(i=0;i<4;i++)
				printf("%5.1f",* (* (p+j)+i)); //输出
			printf("\n");
		}
	}
}


/*
void swap(int *p1,int *p2) //定义swap函数
{
	int temp;
	temp =*p1; //使*p1和*p2互换
	*p1=*p2;
	*p2=temp;
}
*/


void average(float * p,int n) //定义求平均成绩的函数
{
	float * p_end; 
	float sum=0,aver;
	p_end=p+n-1; //n的值为12时，p_end的值是p+11，指向最后一个元素
	for(;p<=p_end;p++)
		sum=sum+(* p);
	aver=sum/n;
	printf("average=%5.2f\n",aver);
}

/*
void search(float (* p)[4],int n) //p是指向具有4个元素的一维数组的指针
{
	int i;
	printf("The score of No.%d are:\n",n);
	for(i=0;i<4;i++)
		printf("%5.2f ",*(* (p+n)+i));
	printf("\n");
}
*/

void exchange(int *q1,int *q2,int *q3) //定义将3个变量的值交换的函数
{
	void swap(int *pt1,int *pt2); //函数声明
	if(*q1<*q2) swap(q1,q2); //如果a<b，交换a和b的值
	if(*q1<*q3) swap(q1,q3); //如果a<c，交换a和c的值
	if(*q2<*q3) swap(q2,q3); //如果b<c,交换b和c的值
	
}

void swap(int *pt1,int *pt2) //定义交换2个变量的值的函数
{
	int temp; 
	temp =*pt1; //交换*pt1和*pt2变量的值
	*pt1=*pt2;
	*pt2=temp;
}

/*
void inv(int x[],int n) //形参x是数组名
{
	int temp,i,j,m=(n-1)/2;
	for(i=0;i<=m;i++)
	{
		j=n-1-i;
		temp=x[i];x[i]=x[j];x[j]=temp; //把x[i]和x[j]交换
	}
	return;
}
*/

void inv(int *x,int n)
{
	int *p,temp,*i,*j,m=(n-1)/2;
	i=x;j=x+n-1;p=x+m;
	for(;i<=p;i++,j--)
	{
		temp=*i;*i=*j;*j=temp; //*i与*j交换
	}
	return;
}

/*
void sort(int x[],int n) //定义sort函数，x是形参数组名
{
	int i,j,k,t;
	for(i=0;i<n-1;i++)
	{
		k=i;
		for(j=i+1;j<n;j++)
			if(x[j]>x[k]) k=j;
		if(k!=i)
		{
			t=x[i];x[i]=x[k];x[k]=t;
		}
	}
}
*/

void sort(int *x,int n) //形参x是指针变量
{
	int i,j,k,t;
	for(i=0;i<n-1;i++)
	{
		k=i;
		for(j=i+1;j<n;j++)
			if(*(x+j)>*(x+k)) k=j; //*(x+j)就是x[j]，其他亦然
		if(k!=i)
		{
			t=*(x+i);
			*(x+i)=*(x+k);
			*(x+k)=t;
		}
	}
}
	