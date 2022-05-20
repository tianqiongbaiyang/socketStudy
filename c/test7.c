#include <stdio.h>

int main(int argc, char *argv[]) {
	/*
	int a=100,b=10; //定义整型变量a,b,并初始化
	int *pointer_1,*pointer_2; //定义指向整型数据的指针变量pointer_1,pointer_2
	
	pointer_1=&a; //把变量a的地址赋给指针变量pointer_1
	pointer_2=&b; //把变量b的地址赋给指针变量pointer_2
	printf("a=%d,b=%d\n",a,b); //输出变量a和b的值
	printf("*pointer_1=%d,*pointer_2=%d\n",*pointer_1,*pointer_2); //输出变量a和b的值
	*/
	
	/*
	//先大后小输出
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
	printf("max=%d,min=%d\n",*p1,*p2); //输出p1和p2所指向的变量的值
	*/
	
	/*
	//交换值
	void swap(int *p1,int *p2); //对swap函数的声明
	int a,b; 
	int *pointer_1,*pointer_2; ///定义两个int*型的指针变量
	printf("please enter a and b:"); //定义两个int*型的指针变量
	scanf("%d,%d",&a,&b);
	
	pointer_1=&a; //使pointer_1指向a
	pointer_2=&b; //使pointer_2指向b
	if(a<b) swap(pointer_1,pointer_2); //如果a<b,调用swap函数
	printf("max=%d,min=%d\n",a,b); //输出结果
	*/
	
	//由大到小输出a,b,c
	void exchange(int *q1,int *q2,int *q3); //函数声明
	int a,b,c,*p1,*p2,*p3;
	printf("please enter three numbers:");
	scanf("%d,%d,%d",&a,&b,&c);
	p1=&a;p2=&b;p3=&c;
	
	exchange(p1,p2,p3);
	printf("The order is:%d,%d,%d\n",a,b,c);
	
	return 0;
}

void exchange(int *q1,int *q2,int *q3) //定义i将3个变量的值交换的函数
{
	void swap(int *p1,int *p2); //函数声明
	if(*q1<*q2) swap(q1,q2); //如果a<b,交换a和b的值
	if(*q1<*q3) swap(q1,q3); //如果a<c，交换a和c的值
	if(*q2<*q3) swap(q2,q3); //如果b<c,交换b和c的值
}

void swap(int *p1,int *p2) //定义swap函数
{
	//使*p1和*p2互换
	int temp; 
	temp=*p1;
	*p1=*p2;
	*p2=temp;
}