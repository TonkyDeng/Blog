from django.shortcuts import render
from blog.models import Py, Debug, Ideal_Reality, Essay
from django.shortcuts import render_to_response
# Create your views here.

def index(request):
	return render_to_response('index.html')

def py(request,title=''):
	if(title == ''):
		py_list = Py.objects.order_by('-timestamp')#按时间戳排序
	else:
		if(title[-1:] == '/'):
			title = title[:-1]
		py_list = Py.objects.filter(title = title)
	py_list = translater(py_list)#替换
	return render_to_response('article_list.html',{'article_list' : py_list,'item':'py'})

def debug(request):
	debug_list = Debug.objects.order_by('-timestamp')#按时间戳排序
	return render_to_response('debug.html',{'debug_list' : debug_list})

def ideal_reality(request):
	ideal_reality_list = Ideal_Reality.objects.order_by('-ideal_timestamp')#按时间戳排序
	return render_to_response('ideal_reality.html',{'ideal_reality_list' : ideal_reality_list})

def essay(request,title=''):
	if(title == ''):
		essay_list = Essay.objects.order_by('-timestamp')#按时间戳排序
	else:
		if(title[-1:] == '/'):
			title = title[:-1]
		essay_list = Essay.objects.filter(title = title)
	essay_list = translater(essay_list)
	return render_to_response('article_list.html',{'article_list' : essay_list,'item' : 'essay'}) 


def translater(words):
	for n in range(len(words)):
		words[n].body = words[n].body.replace('\n','<br>')
		words[n].body = words[n].body.replace('########','<hr>')
		words[n].body = words[n].body.replace(' ','&nbsp;')
	return words
