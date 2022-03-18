#include <stdio.h>

int main() {
	int a,b,c,maxValue;
	int max(int d,int f);
	
	scanf("%d,%d,%d",&a,&b,&c);
	maxValue = max(a,b);
	maxValue = max(maxValue, c);
	
	printf("maxValue is %d\n", maxValue);
	
	return 0;
}

int max(int d,int f)
{
	int z;
	if(d>f) z=d;
	else z=f;
	
	return (z);
}