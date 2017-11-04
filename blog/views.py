from django.shortcuts import render
from blog.models import Py, Debug, Ideal_Reality, Essay
from django.shortcuts import render_to_response
# Create your views here.

def page_not_found(request):
	return render_to_response('error/404.html')

def page_error(request):
    return render(request, 'error/500.html')

def permission_denied(request):
	return render(request, 'error/403.html')



def index(request):
	return render_to_response('index.html')

def py(request,title=''):
	if(title == ''):
		py_list = Py.objects.order_by('-timestamp')#按时间戳排序
	else:
		if(title[-1:] == '/'):
			title = title[:-1]
		py_list = Py.objects.filter(title = title)
	py_list = translater(py_list)
	return render_to_response('article_list.html',{'article_list' : py_list,'item':'py'})

def debug(request):
	debug_list = Debug.objects.order_by('-timestamp')#按时间戳排序
	for n in range(len(debug_list)):
		debug_list[n].bug = debug_list[n].bug.replace('\n','<br>')
		debug_list[n].bug = debug_list[n].bug.replace(' ','&nbsp;')
		debug_list[n].debug = debug_list[n].debug.replace('\n','<br>')
		debug_list[n].debug = debug_list[n].debug.replace(' ','&nbsp')
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
