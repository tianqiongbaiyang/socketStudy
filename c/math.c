#include <stdio.h>
#include <math.h>

int main()
{
	double a=3.67,b=5.43,c=6.21,s,area;
	s=(a+b+c)/2;
	area=sqrt(s*(s-a)*(s-b)*(s-c));
	
	printf("a=%f\tb=%f\tc=%f\n",a,b,c);
	printf("area=%f\n",area);
	
	return 0;
}