# Blog
My blog in my life

Run:

	Uwsgi:
		tonky@localhost:~/Blog$ uwsgi --socket :8888 --module website.wsgi --chdir /home/tonky/Blog/
	
	Nginx:
		sudo service nginx start
	
	Ngrok:
		./sunny clientid d9a717fd0b8bee5f
