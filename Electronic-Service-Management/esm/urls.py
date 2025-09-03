"""esm URL Configuration

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
    path('userreg',views.userreg),
    path('wrkreg',views.wrkreg),
    path('addworker',views.addworker),
    path('adduser',views.adduser),
    path('login/',views.login),
    path('login/addlogin',views.addlogin),
    path('logout/',views.logout),
    path('viewusers',views.viewusers),
    path('deleteuser/<int:id>',views.deleteuser),
    path('updateuser/<int:id>',views.updateuser),
    path('updateuser/updateu/<int:id>',views.updateu),
    path('viewworker',views.viewworker),
    path('deleteworker/<int:id>',views.deleteworker),
    path('updateworker/<int:id>',views.updateworker),
    path('updateworker/updatew/<int:id>',views.updatew),
    path('complaint',views.complaint),
    path('addcomplaint',views.addcomplaint),
    path('viewcomplaint',views.viewcomplaint),
    path('awork/<int:id>',views.awork),
    path('awork/assignwork/<int:id>',views.assignwork),
    path('viewwork',views.viewwork),
    path('acceptreq/<int:id>',views.acceptreq,name="acceptreq"),
    path('rejectreq/<int:id>',views.rejectreq,name="rejectreq"),
    path('complete/<int:id>',views.complete,name="complete"),
    path('v_usercompletedworks',views.v_usercompletedworks),
    path('viewcompletedworks',views.viewcompletedworks),
    path('bill/<int:id>',views.bill),
    path('bill/addbill',views.addbill),
    path('viewbill/<int:id>',views.viewbill),
    path('viewbill/payment/<int:id>',views.payment),
    path('viewbill/payment/addpayment/<int:id>',views.addpayment),
    path('viewpayment',views.viewpayment),
    path('viewpaymentworker',views.viewpaymentworker),
    path('viewprofile',views.viewprofile),
  
   
]
