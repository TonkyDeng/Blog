from django.shortcuts import render
from blog.models import Py, Debug, Ideal_Reality, Essay
from django.shortcuts import render_to_response
from blog.markdown.translater import getHTML
# Create your views here.

def page_not_found(request):
	return render_to_response('error/404.html')

def page_error(request):
    return render_to_response(request, 'error/500.html')

def permission_denied(request):
	return render_to_response(request, 'error/403.html')



def index(request):
	return render_to_response('index.html')

def py(request,title=''):
	if(title == ''):
		py_list = Py.objects.order_by('-timestamp')#按时间戳排序
	else:
		if(title[-1:] == '/'):
			title = title[:-1]
		py_list = Py.objects.filter(title = title)
	for n in py_list:
		n.body = getHTML(n.body)
	return render_to_response('article_list.html',{'article_list' : py_list,'item':'py'})

def debug(request):
	debug_list = Debug.objects.order_by('-timestamp')#按时间戳排序
	for n in debug_list:
		n.bug = getHTML(n.bug)
		n.debug = getHTML(n.debug)
	return render_to_response('debug.html',{'debug_list' : debug_list})

def ideal_reality(request):
	ideal_reality_list = Ideal_Reality.objects.order_by('-ideal_timestamp')#按时间戳排序
	for n in ideal_reality_list:
		n.ideal = getHTML(n.ideal)
		n.reality = getHTML(n.reality)
	return render_to_response('ideal_reality.html',{'ideal_reality_list' : ideal_reality_list})

def essay(request,title=''):
	if(title == ''):
		essay_list = Essay.objects.order_by('-timestamp')#按时间戳排序
	else:
		if(title[-1:] == '/'):
			title = title[:-1]
		essay_list = Essay.objects.filter(title = title)
	for n in essay_list:
		n.body = getHTML(n.body)
	return render_to_response('article_list.html',{'article_list' : essay_list,'item' : 'essay'}) 
