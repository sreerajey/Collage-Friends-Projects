"""Fencing URL Configuration

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
    path('admin/', admin.site.urls),
    path('home',views.home),
    path('',views.index),
    path('Register',views.register),
    path('addregister',views.addregister),
    path('login/',views.login),
    path('login/addlogin',views.addlogin),
    path('logout/',views.logout),
    path('viewuser',views.viewuser),
    path('addtournament',views.addtournament),
    path('addtour',views.addtour),
    path('viewtournament',views.viewtournament),

    path('add_schedule/<int:id>',views.add_schedule),
    path('add_schedule/addsch/<int:id>',views.addsch),
    path('view_schedule/<int:id>',views.view_schedule),
    path('medals',views.medals),
    path('add_medal/<int:id>',views.add_medal),
    path('addmed/<int:id>', views.addmed, name='addmed'),
    path('view_medals/<int:id>',views.view_medals),
    path('viewtournament_user',views.viewtournament_user),
    path('view_details/<int:id>',views.view_details),
    path('userreg_tournament/<int:id>',views.userreg_tournament),
    path('userreg_tournament/add_userreg_tournament',views.add_userreg_tournament),

    path('accept_request/<int:id>',views.accept_request),
    path('reject_request/<int:id>',views.reject_request),
    path('my_registers',views.my_registers),
    path('up_scores/<int:id>',views.up_scores),
    path('up_status/<int:id>',views.up_status),
    path('pool',views.pool),
    path('add_pool/<int:id>',views.add_pool),
    path('add_pool/addpool/<int:id>', views.addpool, name='addpool'),
    path('view_pools/<int:id>',views.view_pools),







    path('view_reg',views.view_reg),






    
]+ static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)

