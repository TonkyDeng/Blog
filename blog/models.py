from django.db import models
from django.contrib import admin

# Create your models here.
class Py(models.Model):
    title = models.CharField(max_length = 150)
    body = models.TextField()
    timestamp = models.DateTimeField()

class Debug(models.Model):
	bug = models.TextField()
	env = models.CharField(max_length = 150)
	timestamp = models.DateTimeField()
	debug = models.TextField(blank=True)

class Ideal_Reality(models.Model):
	ideal = models.TextField()
	ideal_timestamp = models.DateTimeField()
	reality = models.TextField(blank=True)
	reality_timestamp = models.DateTimeField(blank=True,null=True)

class Essay(models.Model):
    title = models.CharField(max_length = 150)
    body = models.TextField()
    timestamp = models.DateTimeField()

class PyAdmin(admin.ModelAdmin):
	list_display = ('title','timestamp')

class DebugAdmin(admin.ModelAdmin):
	list_display = ('bug','timestamp')

class Ideal_RealityAdmin(admin.ModelAdmin):
	list_display = ('ideal','ideal_timestamp')

class EssayAdmin(admin.ModelAdmin):
	list_display = ('title','timestamp')


admin.site.register(Py,PyAdmin)
admin.site.register(Debug,DebugAdmin)
admin.site.register(Ideal_Reality,Ideal_RealityAdmin)
admin.site.register(Essay,EssayAdmin)
