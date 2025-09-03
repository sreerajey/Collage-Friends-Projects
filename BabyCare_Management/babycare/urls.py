"""babycare URL Configuration

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/3.2/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  path('', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  path('', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.urls import include, path
    2. Add a URL to urlpatterns:  path('blog/', include('blog.urls'))
"""
from django.contrib import admin
from django.urls import path
from . import views
from django.conf.urls import url
from django.conf import settings
from django.conf.urls.static import static

urlpatterns = [
    path('',views.first),
    path('index',views.index),
    path('parentreg',views.parentreg),
    path('addparent',views.addparent),
    path('login/',views.login),
    path('login/addlogin',views.addlogin),
    path('logout/',views.logout),
    path('child',views.child),
    path('addchild',views.addchild),
    path('viewchild',views.viewchild),
    path('deletechild/<int:id>',views.deletechild),
 
    path('addstaytype',views.addstaytype),
    path('viewstaytype',views.viewstaytype),
    path('deletestaytype/<int:id>',views.deletestaytype),
    path('addcategory',views.addcategory),
    path('viewcategory',views.viewcategory),
    path('deletecategory/<int:id>',views.deletecategory),
    path('addoption',views.addoption),
    path('viewoption',views.viewoption),
    path('deleteoption/<int:id>',views.deleteoption),
    path('addrequirement',views.addrequirement),
    path('viewrequirement',views.viewrequirement),
    path('deleterequirement/<int:id>',views.deleterequirement),
    
    path('feedback',views.feedback), 
    path('addfeedback',views.addfeedback), 
    path('v_feedback',views.v_feedback),   
    path('mark_attendance',views.mark_attendance), 
    path('mark/<int:id>',views.mark,name='mark'),
    path('mark/addattendance',views.addattendance), 
    path('view_attendence',views.view_attendence), 
    path('child_profile',views.child_profile),
    path('addevent',views.addevent),
    path('viewevent',views.viewevent),
    path('deleteevent/<int:id>',views.deleteevent),
    path('viewevent_parent',views.viewevent_parent),
    path('addnotification',views.addnotification),
    path('viewnotification',views.viewnotification),
    path('deletenotification/<int:id>',views.deletenotification),
    path('viewnotification_parent',views.viewnotification_parent),
    path('alert',views.alert),
    path('addalert',views.addalert),
    path('viewalert',views.viewalert),
    path('addpickup',views.addpickup),
    path('viewpickup',views.viewpickup),
    path('bill/<int:id>', views.bill, name='bill'),
    path('bill/addbill/<int:id>', views.addbill, name='addbill'),
    path('viewbill',views.viewbill),
    path('paymode/<int:id>',views.paymode),
    path('addcard/<int:id>',views.addcard,name='addcard'),
    


    











    







] + static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)
