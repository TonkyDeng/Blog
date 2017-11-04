"""website URL Configuration

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/1.11/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  url(r'^$', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  url(r'^$', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.conf.urls import url, include
    2. Add a URL to urlpatterns:  url(r'^blog/', include('blog.urls'))
"""
from django.conf.urls import url
from django.contrib import admin
from blog.views import *
urlpatterns = [
	url(r'^admin/', admin.site.urls),
	url(r'^$',index),
	url(r'^py/(.*)$',py),#匹配中文
	url(r'^debug/$',debug),
	url(r'^ideal&reality/$',ideal_reality),
	url(r'^essay/(.*)$',essay),
]

handler404 = page_not_found
handler500 = page_error
handler403 = permission_denied
