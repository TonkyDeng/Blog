from django.shortcuts import render
from blog.models import Py, Debug, Ideal_Reality, Essay
from django.shortcuts import render_to_response
# Create your views here.

def index(request):
	blog_list = Py.objects.filter()
	return render_to_response('index.html',{'index' : 'http://192.168.43.102:8000'})

def py(request,title=''):
	if(title == ''):
		py_list = Py.objects.all()
		return render_to_response('article_list.html',{'article_list' : py_list,'item':'py'})
	else:
		if(title[-1:] == '/'):
			title = title[:-1]
		py_list = Py.objects.filter(title = title)
		return render_to_response('article_list.html',{'article_list' : py_list,'item':'py'})

def debug(request):
	debug_list = Debug.objects.all()
	return render_to_response('debug.html',{'debug_list' : debug_list})

def ideal_reality(request):
	ideal_reality_list = Ideal_Reality.objects.all()
	return render_to_response('ideal_reality.html',{'ideal_reality_list' : ideal_reality_list})

def essay(request,title=''):
	if(title == ''):
		essay_list = Essay.objects.all()
		return render_to_response('article_list.html',{'article_list' : essay_list,'item' : 'essay'})
	else:
		if(title[-1:] == '/'):
			title = title[:-1]
		essay_list = Essay.objects.filter(title = title)
		return render_to_response('article_list.html',{'article_list' : essay_list,'item' : 'essay'}) 
