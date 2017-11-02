#!/usr/bin/python
# -*- coding: utf-8 -*-
import sys
import json
import requests
def getRes(url,headers={}):	
	res = requests.get(url,headers=headers)
	return res.text

def getList(qq):
	res = getRes('https://c.y.qq.com/rsc/fcgi-bin/fcg_get_profile_homepage.fcg?jsonpCallback=MusicJsonCallback9520110164977194&cid=205360838&userid='+qq+'&reqfrom=1')
	js = json.loads(res.strip().strip('MusicJsonCallback9520110164977194()'))
	js = js['data']

	#user info
	nick = js['creator']['nick']
	imag = js['creator']['headpic']
	taste = js['creator']['cfinfo']['title']

	#fav
	favurl = js['mymusic'][0]['jumpurl']

	#list
	lists = js['mydiss']['list']#title dissid picurl subtitle

	print('counting song.')
	global count
	for c in lists:
		count = count + int(c['subtitle'].split('首')[0])
	print('counted '+str(count)+' song.')
	

	list = [getSong(x['dissid']) for x in lists]

	for n in range(len(lists)):
		lists[n]["songs"] = list[n]
		del lists[n]['iconurl']
		del lists[n]['isshow']
		del lists[n]['dissid']
		del lists[n]['dirid']
		del lists[n]['icontype']

	return {"nick":nick,"imag":imag,"taste":taste,"favurl":favurl,"lists":lists}

def getSong(sid):
	
	headers = {
		'User-Agent': 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36',
    	'Referer': 'y.qq.com',
	}#from Requests Headers

	res = getRes('https://c.y.qq.com/qzone/fcg-bin/fcg_ucc_getcdinfo_byids_cp.fcg?type=1&disstid='+str(sid)+'&g_tk=5381&jsonpCallback=playlistinfoCallback',headers)
	js = json.loads(res.strip('playlistinfoCallback()'))
	js = js['cdlist'][0]['songlist']
	songs = []
	for j in js:
		song = {
				"song":j['songname'],
				"singer":j['singer'][0]['name'],
		}
		getUrl = lambda songmid,mid:'http://dl.stream.qqmusic.qq.com/C400'+songmid+'.m4a?vkey='+json.loads(getRes('https://c.y.qq.com/base/fcgi-bin/fcg_music_express_mobile3.fcg?&jsonpCallback=MusicJsonCallback&cid=205361747&songmid='+mid+'&filename=C400'+songmid+'.m4a&guid=6908829875',headers))['data']['items'][0]['vkey']+'&guid=6908829875&fromtag=66'
		global count
		global cur
		try:
			song["url"]=getUrl(j['strMediaMid'],j['songmid'])
			songs.append(song)
			#print('\rget ['+song['song']+'] success!')
		except:
			#print('\rget ['+song['song']+'] wrong!!!')
			pass
		cur = cur + 1
		x = cur*100/count
		#print('▐'*(int(x/2))+'  '+str(x)+'%',end="")
		sys.stdout.write('| %s |  %%.4f'%('█'*(int(x/2)))  %x)
		sys.stdout.write("%\r");
		sys.stdout.flush();

	return songs
def Writer(qq='2797977995'):
	print('start update!')
	file = open('list.new','w')
	cache = str(getList(qq))
	print('start write list file!')
	file.write(cache)
	file.close()
	print('update success!')

count = 0
cur = 0
Writer('1797977995');
