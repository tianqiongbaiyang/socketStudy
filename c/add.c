#include <stdio.h>

int main()
{
	int add(int a,int b);
	int a,b,sum;
	scanf("%d %d",&a,&b);
	sum=add(a,b);
	printf("sum=%d",sum);
	
	return 0;
}

int add(int x,int y)
{
	int z;
	z=x+y;
	return(z);
}