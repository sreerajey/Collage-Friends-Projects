from django.db import models


class userregg(models.Model):
    name=models.CharField(max_length=150)
    email=models.CharField(max_length=150)
    place=models.CharField(max_length=150)
    phone=models.CharField(max_length=150)
    password=models.CharField(max_length=150)

class wrkregg(models.Model):
    name=models.CharField(max_length=150)
    email=models.CharField(max_length=150)
    place=models.CharField(max_length=150)
    phone=models.CharField(max_length=150)
    password=models.CharField(max_length=150)

class complainttbl(models.Model):
    dname=models.CharField(max_length=150)
    image=models.CharField(max_length=150)
    desc=models.CharField(max_length=150)
    date=models.DateTimeField(max_length=150)
    uid=models.CharField(max_length=150)
    status=models.CharField(max_length=150)


class assigntbl(models.Model):
    wname=models.CharField(max_length=150)
    wid=models.CharField(max_length=150)
    cmpltid=models.ForeignKey(complainttbl, on_delete=models.CASCADE)
    uname=models.CharField(max_length=300)
    time=models.DateTimeField(max_length=300)
    status=models.CharField(max_length=100)
    cstatus=models.CharField(max_length=100)
    uid=models.CharField(max_length=100)
   
class billtbl(models.Model):
    wid=models.CharField(max_length=150)
    uid=models.CharField(max_length=150)
    amount=models.CharField(max_length=300)
    status=models.CharField(max_length=100)

class paymenttbl(models.Model):
    uname=models.CharField(max_length=100)
    rate=models.CharField(max_length=100)
    uid=models.CharField(max_length=100)
    wid=models.CharField(max_length=100)
    cardtype=models.CharField(max_length=100)
    cardname=models.CharField(max_length=100)
    cardno=models.CharField(max_length=100)
    cvv=models.CharField(max_length=100)

