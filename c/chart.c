#include <stdio.h>

int main()
{
	int i;
	for(i=0;i<4;i++){
		int j=0;
		for(j=0;j<i*2;j++){
			printf(" ");
		}
		printf("****\n");
	}
}