//#include<stdio.h>
//int main( )
//{ 
//	char c1,c2;
//	c1=getchar( );
//	if ( 97<=c1 && c1<=122      )c2=  c1-32         ;
//	else c2=c1;
//	putchar('\n');putchar('\'' );putchar(c2); putchar('\'' );
//	return 0;
//}

#include<stdio.h>
int main()
{ 
	float v1, v2; char op;
	printf("please type your expression:\n");
	scanf("%f%c%f",&v1,&op,&v2);
	switch (  op     )
	{
		case '+': printf("%1.0f+%1.0f=%1.0f\n", v1, v2, v1 + v2); break;
		case '-': printf("%1.0f-%1.0f=%1.0f\n", v1, v2, v1 - v2); break;
		case '*': printf("%1.0f*%1.0f=%1.0f\n", v1, v2, v1 * v2); break;
		case '/':
			if (   v2==0    ) printf("除数为零\n");
			else printf("%1.0f/%1.0f=%1.0f\n",v1,v2,v1/v2);
			break;
		default: printf("运算符错误\n");
	}
	return 0;
}

//#include <stdio.h>
//int main()
//{
//	int num,a,b,c;
//	printf("please input number:\n");
//	scanf("%3d", &num);
//	a=num/100;
//	b=(num-a*100)/10;
//	c=num%10;
//	
//	printf("%d", c*100+b*10+a);
//	return 0;
//}
