from django.http import HttpResponse,HttpResponseRedirect
from django.shortcuts import render
from django.shortcuts import redirect
from django.urls import reverse
from  django.core.files.storage import FileSystemStorage
import datetime
import pycurl
from urllib.parse import urlencode
from .models import *

def first(request):
    return render(request,'index.html')

def index(request):
    return render(request,'index.html')

def userreg(request):
    return render(request,'userregister.html')

def wrkreg(request):
    return render(request,'w_register.html')


def login(request):
    return render(request,'login.html')

def adduser(request):
    if request.method=="POST":
        name=request.POST.get('name')
        email=request.POST.get('email')
        place=request.POST.get('place')
        phone=request.POST.get('phone')
        password=request.POST.get('password')

        cus=userregg(name=name,email=email,place=place,phone=phone,password=password)
        cus.save()
        return render(request,'index.html', {'message1':'successfully Registered'})

def addworker(request):
    if request.method=="POST":
        name=request.POST.get('name')
        email=request.POST.get('email')
        place=request.POST.get('place')
        phone=request.POST.get('phone')
        password=request.POST.get('password')
        cus=wrkregg(name=name,email=email,place=place,phone=phone,password=password)
        cus.save()
        return render(request,'index.html', {'message1':'successfully Registered'})

def addlogin(request):
    email = request.POST.get('email')
    password = request.POST.get('password')
    if email == 'admin@gmail.com' and password =='admin':
        request.session['logintdetail'] = email
        request.session['admin'] = 'admin'
        
        return redirect(index)

    elif userregg.objects.filter(email=email,password=password).exists():
        userdetails=userregg.objects.get(email=request.POST['email'], password=password)
        if userdetails.password == request.POST['password']:
            request.session['uid'] = userdetails.id
            request.session['uname'] = userdetails.name

            request.session['uemail'] = email

            request.session['cus'] = 'cus'


            return redirect(index)

    elif wrkregg.objects.filter(email=email,password=password).exists():
        userdetails=wrkregg.objects.get(email=request.POST['email'], password=password)
        if userdetails.password == request.POST['password']:
            request.session['wid'] = userdetails.id
            request.session['wname'] = userdetails.name

            request.session['wemail'] = email



            return redirect(index)

    else:
        return render(request, 'login.html')  

def logout(request):
    session_keys = list(request.session.keys())
    for key in session_keys:
        del request.session[key]
    return redirect(first)

def viewusers(request):
    user = userregg.objects.all()
    return render(request, 'viewusers.html', {'result': user})

def deleteuser(request,id):
	user=userregg.objects.get(pk=id)
	user.delete()
	return redirect(viewusers)

def updateuser(request,id):
    select=userregg.objects.get(id=id)
    return render (request,'updateuser.html',{'result':select})

def updateu(request,id):
   if request.method=="POST":
        name=request.POST.get('name')
        email=request.POST.get('email')
        place=request.POST.get('place')
        phone=request.POST.get('phone')
        password=request.POST.get('password')
        cus=userregg(name=name,email=email,place=place,phone=phone,password=password,id=id)
        cus.save()
        return redirect(viewusers)

def viewworker(request):
    user = wrkregg.objects.all()
    return render(request, 'viewworkers.html', {'result': user})

def deleteworker(request,id):
	wrk=wrkregg.objects.get(pk=id)
	wrk.delete()
	return redirect(viewworker)

def updateworker(request,id):
    select=wrkregg.objects.get(id=id)
    return render (request,'updateworker.html',{'result':select})

def updatew(request,id):
   if request.method=="POST":
        name=request.POST.get('name')
        email=request.POST.get('email')
        place=request.POST.get('place')
        phone=request.POST.get('phone')
        password=request.POST.get('password')
        cus=wrkregg(name=name,email=email,place=place,phone=phone,password=password,id=id)
        cus.save()
        return redirect(viewworker)
        

def complaint(request):  
    return render(request,'addcomplaint.html')   

def addcomplaint(request):
    if request.method=="POST":
        user=request.session['uid']
        dname=request.POST.get('dname')
        desc=request.POST.get('desc')
        date=request.POST.get('date')
        b=request.FILES['image']  
        fs=FileSystemStorage()
        file=fs.save(b.name,b)     
        cus=complainttbl(dname=dname,desc=desc,date=date,uid=user,image=file,status="pending")
        cus.save()
        return render(request,'index.html', {'message1':'successfully Registered'})


def viewcomplaint(request):  
    a=complainttbl.objects.all()
    b= userregg.objects.all()
    for i in a:
        for j in b:
            if str(i.uid)==str(j.id):
               i.uid=j.name 
    return render(request,'viewcomplaint.html',{'result':a}) 

def awork(request,id):
    a=complainttbl.objects.get(id=id)
    b=wrkregg.objects.all()
    c=userregg.objects.all()
  
   
    return render (request,'assignwork.html',{'result':a,'res':b})  

from django.shortcuts import get_object_or_404


def assignwork(request, id):
    if request.method == "POST":
        a = request.POST.get('wname')
       
        c = request.POST.get('time')
        d = request.POST.get('cmpltid')
        e= request.POST.get('uid')
        complaint_instance = get_object_or_404(complainttbl, id=d)
       
        cus = assigntbl(wname=a, time=c, cmpltid=complaint_instance, 
                        uid=e,status="pending", cstatus="Not Completed")
        cus.save()

    return render(request, "assignwork.html")

from django.core.exceptions import ObjectDoesNotExist

def viewwork(request):
    try:
        id = request.session['wname']
        cus_list = assigntbl.objects.filter(wname=id)
        a = userregg.objects.all()

        for b in cus_list:
            for user in a:
                if str(b.cmpltid.uid) == str(user.id):
                    b.cmpltid.uid = user.name

        return render(request, 'viewwork.html', {'result': cus_list})
    except ObjectDoesNotExist:
        return render(request, 'viewwork.html', {'result': None})




def acceptreq(request,id):
    sel=assigntbl.objects.get(id=id)
    a=sel.wname
    b=sel.uid
    c=sel.cmpltid
    d=sel.time

   
    upd=assigntbl(wname=a,uid=b,cmpltid=c,time=d,status='accepted',cstatus="Not Completed",id=id)
    upd.save()
    return redirect(viewwork)
   

def rejectreq(request,id):
    sel=assigntbl.objects.get(id=id)
    sel.delete()
    return redirect(viewwork)

def complete(request,id):
    sel=assigntbl.objects.get(id=id)
    a=sel.wname
    b=sel.uid
    c=sel.cmpltid
    d=sel.time

   
    upd=assigntbl(wname=a,uid=b,cmpltid=c,time=d,status='accepted',cstatus="Completed",id=id)
    upd.save()
    return redirect(viewwork)

def v_usercompletedworks(request):
    id = request.session['uid']
    user=assigntbl.objects.filter(uid=id,cstatus='Completed')
    return render (request,'v_usercompletedworks.html',{'result':user})

def viewcompletedworks(request): 
    a=assigntbl.objects.all()
    b=userregg.objects.all()
    for i in a:
        for j in b:
            if str(i.uid)==str(j.id):
               i.uid=j.name 

    return render (request,'viewcompletedworks.html',{'result':a})

def bill(request,id):  
    a=assigntbl.objects.get(id=id)
    return render(request,'addbill.html',{'result':a})

def addbill(request):
    if request.method=='POST':
        a=request.POST.get('amount')
        b=request.POST.get('uid')
        c=request.POST.get('wid')
        sell=billtbl(amount=a,uid=b,wid=c,status="pending")
        sell.save()
    return render(request,'addbill.html')


from django.core.exceptions import ObjectDoesNotExist

def viewbill(request,id):
    try:
        id = request.session['uid']
        a = billtbl.objects.get(uid=id)
        
        b = userregg.objects.all()
        for j in b:
            if str(a.uid) == str(j.id):
                a.uid = j.name

        return render(request, 'viewbill.html', {'result': a})
    except ObjectDoesNotExist:
        # Handle the case when the billtbl object does not exist
        return render(request, 'viewbill.html', {'result': None})



def payment(request,id):
    a=billtbl.objects.get(id=id)
    return render (request,'payment.html',{'result':a})

def addpayment(request,id):
    if request.method=="POST":
        user=request.session['uname']
        b=request.POST.get('wid')
        c=request.POST.get('rate')
        e=request.POST.get('cardtype')
        f=request.POST.get('cardname')
        g=request.POST.get('cardno')
        h=request.POST.get('cvv')
        ins=paymenttbl(wid=b,rate=c,cardtype=e,cardname=f,cardno=g,cvv=h,uid=user,id=id)      
        ins.save()
    return render(request,'index.html',{'msg':' Payment Successfull'})  

def viewpayment(request):
    a=paymenttbl.objects.all()
    b=wrkregg.objects.all()
    for i in a:
        for j in b:
           if str(i.wid)==str(j.id):
              i.wid=j.name
    return render (request,'viewpayment.html',{'result':a})

def viewpaymentworker(request):
    id=request.session['wname']
    a=paymenttbl.objects.filter(wid=id)
    return render (request,'viewpaymentworker.html',{'result':a})

def viewprofile(request):
    id = request.session['uid']
    user=userregg.objects.get(id=id)
    return render (request,'viewprofile.html',{'result':user})




















'''def ufeedback(request):
    return render(request,'u_feedback.html')

def adduserfdbk(request):
    if request.method=="POST":
        user=request.session['uname']
        feedback=request.POST.get('feedback')
        cus=user_feedback(uname=user,feedback=feedback)
        cus.save()
        return render(request,'u_feedback.html',{'status': 'Register Successfully'})

def wfeedback(request):
    return render(request,'w_feedback.html')

def addwrkrfdbk(request):
    if request.method=="POST":
        user=request.session['wname']
        feedback=request.POST.get('feedback')
        cus=wrkr_feedback(uname=user,feedback=feedback)
        cus.save()
        return render(request,'w_feedback.html',{'status': 'Register Successfully'})

def viewfeedbacks(request):
     user = user_feedback.objects.all()
     user1 = wrkr_feedback.objects.all()
     return render(request, 'viewfeedbacks.html', {'result': user,'results': user1})

'''