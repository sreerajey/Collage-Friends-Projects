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

def parentreg(request):
    return render(request,'register.html')

def addparent(request):
    if request.method=="POST":
        name=request.POST.get('name')
        mname=request.POST.get('mname')
        lname=request.POST.get('lname')
        address=request.POST.get('address')
        district=request.POST.get('district')
        email=request.POST.get('email')
        password=request.POST.get('password')

        cus=parenttbl(name=name,mname=mname,lname=lname,address=address,district=district,email=email,password=password)
        cus.save()
        return render(request,'index.html', {'message1':' successfully Registered'})
    
def login(request):
    return render(request,'login.html')

def addlogin(request):
    email = request.POST.get('email')
    password = request.POST.get('password')
    if email == 'admin@gmail.com' and password =='admin':
        request.session['logintdetail'] = email
        request.session['admin'] = 'admin'
        return render(request,'index.html')

    elif parenttbl.objects.filter(email=email,password=password).exists():
        userdetails=parenttbl.objects.get(email=request.POST['email'], password=password)
        if userdetails.password == request.POST['password']:
            request.session['uid'] = userdetails.id
            request.session['uname'] = userdetails.name

            request.session['uemail'] = email

            request.session['cus'] = 'cus'


            return render(request,'index.html')

    else:
        return render(request, 'login.html')
    
def logout(request):
    session_keys = list(request.session.keys())
    for key in session_keys:
        del request.session[key]
    return redirect(first)

def child(request):
     a=staytypetbl.objects.all()
     b=categorytbl.objects.all()
     c=optiontbl.objects.all()
     d=requirementtbl.objects.all()
     e=parenttbl.objects.all()
     return render(request,'addchild.html',{'result':a,'resul':b,'resu':c,'res':d,'hi':e})

def addchild(request):
    if request.method == "POST":
        name = request.POST.get('name')
        age = request.POST.get('age')
        description = request.POST.get('description')
        pid = request.POST.get('pid')
        date = request.POST.get('date')
        gender = request.POST.get('gender')
        dob = request.POST.get('dob')
        staytype_id = request.POST.get('staytype_id')
        category_id = request.POST.get('category_id')
        options_id = request.POST.get('options_id')
        requirements_id = request.POST.get('requirements_id')
        cus = childtbl(
            name=name, age=age, description=description, pid=pid, date=date,
            gender=gender, dob=dob, staytype_id=staytype_id, category_id=category_id,
            options_id=options_id, requirements_id=requirements_id)
        cus.save()

    return render(request, 'index.html', {'message1': 'Successfully Registered'})

   


def viewchild(request):
    select=childtbl.objects.all()
    a=staytypetbl.objects.all()
    b=categorytbl.objects.all()
    c=optiontbl.objects.all()
    d=requirementtbl.objects.all()
    
    for i in select:
        for j in a:
            if str(i.staytype_id)==str(j.id):
                i.staytype_id=j.name
                a=staytypetbl.objects.all()
        for i in select:
            for j in b:
                if str(i.category_id)==str(j.id):
                    i.category_id=j.name
                    b=categorytbl.objects.all()
            for i in select:
              for j in c:
                if str(i.options_id)==str(j.id):
                    i.options_id=j.name
                    c=optiontbl.objects.all()
              for i in select:
                 for j in d:
                    if str(i.requirements_id)==str(j.id):
                       i.requirements_id=j.name
                       d=requirementtbl.objects.all()
                 
    return render(request,'viewchild.html',{'result':select})

def deletechild(request,id):
    select=childtbl.objects.get(id=id)
    select.delete()
    return redirect(viewchild) 




def addstaytype(request):
    if request.method=="POST":
        a=request.POST.get('name')      
        cus=staytypetbl(name=a)
        cus.save()
    return render(request,"addstaytype.html")

def viewstaytype(request):
    select=staytypetbl.objects.all()
    return render(request,'viewstaytype.html',{'result':select})
    
def deletestaytype(request,id):
    select=staytypetbl.objects.get(id=id)
    select.delete()
    return redirect(viewstaytype) 

def addcategory(request):
    if request.method=="POST":
        a=request.POST.get('name')      
        cus=categorytbl(name=a)
        cus.save()
    return render(request,"addcategory.html")

def viewcategory(request):
    select=categorytbl.objects.all()
    return render(request,'viewcategory.html',{'result':select})
    
def deletecategory(request,id):
    select=categorytbl.objects.get(id=id)
    select.delete()
    return redirect(viewcategory) 

def addoption(request):
    if request.method=="POST":
        a=request.POST.get('name')      
        cus=optiontbl(name=a)
        cus.save()
    return render(request,"addoption.html")

def viewoption(request):
    select=optiontbl.objects.all()
    return render(request,'viewoption.html',{'result':select})
    
def deleteoption(request,id):
    select=optiontbl.objects.get(id=id)
    select.delete()
    return redirect(viewoption) 

def addrequirement(request):
    if request.method=="POST":
        a=request.POST.get('name')      
        cus=requirementtbl(name=a)
        cus.save()
    return render(request,"addrequirement.html")

def viewrequirement(request):
    select=requirementtbl.objects.all()
    return render(request,'viewrequirement.html',{'result':select})
    
def deleterequirement(request,id):
    select=requirementtbl.objects.get(id=id)
    select.delete()
    return redirect(viewrequirement) 


    

    

 
    






def feedback(request):
    return render(request,'feedback.html')

def addfeedback(request):
    if request.method=="POST":
        pid=request.session['uid']
        feedback=request.POST.get('feedback')
  
        cus=feedbacks(pid=pid,feedback=feedback)
        cus.save()
        return render(request,'index.html')
    
def v_feedback(request):
    sel=feedbacks.objects.all()
    user=parenttbl.objects.all()
    for i in sel:
        for j in user:
            if str(i.pid)==str(j.id):
                i.pid=j.name
    return render(request,'view_feedback.html',{'result':sel})





def mark_attendance(request):
    sel=childtbl.objects.all()
    user=parenttbl.objects.all()
    for i in sel:
        for j in user:
            if str(i.pid)==str(j.id):
                i.pid=j.name
    return render(request,'mark_attendance.html',{'result':sel})

def mark(request,id):
    sel=childtbl.objects.get(id=id)
    return render(request,'attendance.html',{'result':sel})

def addattendance(request):
    if request.method=="POST":
        b_id=request.POST.get('b_id')
        p_id=request.POST.get('p_id')
        date=request.POST.get('date')
        status=request.POST.get('status')

        cus=attendance(b_id=b_id,status=status,p_id=p_id,date=date)
        cus.save()
        return render(request,'index.html', {'message2':' successfully Added'})

def view_attendence(request):
    user1=request.session['uid']
    sel=attendance.objects.filter(p_id=user1)
    user=childtbl.objects.all()
    for i in sel:
        for j in user:
            if str(i.b_id)==str(j.id):
                i.b_id=j.name
    return render(request,'view_attendance.html',{'result':sel})



def child_profile(request):
    id = request.session.get('uid')
    if id is not None:
        queryset = childtbl.objects.filter(pid=id)
        stay_type = staytypetbl.objects.all()
        categories = categorytbl.objects.all()
        options = optiontbl.objects.all()
        requirements = requirementtbl.objects.all()

        stay_type_dict = {str(stay.id): stay.name for stay in stay_type}
        categories_dict = {str(category.id): category.name for category in categories}
        options_dict = {str(option.id): option.name for option in options}
        requirements_dict = {str(requirement.id): requirement.name for requirement in requirements}

        updated_data = []

        for select in queryset:
            select.staytype_id = stay_type_dict.get(str(select.staytype_id), '')
            select.category_id = categories_dict.get(str(select.category_id), '')
            select.options_id = options_dict.get(str(select.options_id), '')
            select.requirements_id = requirements_dict.get(str(select.requirements_id), '')

            updated_data.append(select)

        return render(request, 'child_profile.html', {'result': updated_data})

    return HttpResponse("User ID not found in the session.")

def addevent(request):
    if request.method=="POST":
        a=request.POST.get('name')   
        b=request.FILES['image']   
        fs=FileSystemStorage()
        file=fs.save(b.name,b)    
        cus=eventtbl(name=a,image=file)
        cus.save()
    return render(request,"addevent.html")

def viewevent(request):
    select=eventtbl.objects.all()
    return render(request,'viewevent.html',{'result':select})
    
def deleteevent(request,id):
    select=eventtbl.objects.get(id=id)
    select.delete()
    return redirect(viewevent) 

def viewevent_parent(request):
    select=eventtbl.objects.all()
    return render(request,'viewevent_parent.html',{'result':select})

def addnotification(request):
    if request.method=="POST":
        a=request.POST.get('noti')      
        cus=notitbl(noti=a)
        cus.save()
    return render(request,"addnotification.html")

def viewnotification(request):
    select=notitbl.objects.all()
    return render(request,'viewnotification.html',{'result':select})
    
def deletenotification(request,id):
    select=notitbl.objects.get(id=id)
    select.delete()
    return redirect(viewnotification) 

def viewnotification_parent(request):
    select=notitbl.objects.all()
    return render(request,'viewnotification_parent.html',{'result':select})

def alert(request):
     a=parenttbl.objects.all()
     return render(request,'addalert.html',{'result':a})

def addalert(request):
    if request.method=="POST":
        a=request.POST.get('msg')
        b=request.POST.get('pid')
        cus=alerttbl(msg=a,pid=b)
        cus.save()
    return render(request,"addalert.html")

from django.shortcuts import render, get_object_or_404




def viewalert(request):
    id = request.session['uid']
    cus=alerttbl.objects.get(pid=id)
    return render (request,'viewalert.html',{'result':cus})

def addpickup(request):
    if request.method=="POST":
        pid = request.session.get('uid') 
        b=request.POST.get('name')
        c=request.FILES['image']   
        fs=FileSystemStorage()
        file=fs.save(c.name,c)    
        cus=pickuptbl(pid=pid,name=b,image=file)
        cus.save()
    return render(request,"addpickup.html")

def viewpickup(request):
    select=pickuptbl.objects.all()
    user=parenttbl.objects.all()
    for i in select:
        for j in user:
            if str(i.pid)==str(j.id):
                i.pid=j.name
    return render(request,'viewpickup.html',{'result':select})


def bill(request,id):
    select = childtbl.objects.get(id=id)
    user = parenttbl.objects.all()
    user1=childtbl.objects.all()
    a=id

    '''  for j in user:
            if str(select.pid) == str(j.id):
                select.pid = j.name
'''
    for j in user1:
     if str(select.id) == str(j.id):
            select.id = j.name
    
    return render(request, 'addbill.html', {'result': select,'res':a})


def addbill(request,id):
    if request.method == "POST":
        pid = request.POST.get('pid')
        cid = request.POST.get('cid')
       
        fees = request.POST.get('fees')
        bill_entry = billstbl(pid=pid,cid=cid,fees=fees,status='pending')
        bill_entry.save()
    return redirect(viewchild)

def viewbill(request):
    id = request.session['uid']
    cus = billstbl.objects.filter(pid=id)
    user = childtbl.objects.all()

    for i in cus:
        for j in user:
            if str(i.cid) == str(j.id):
                i.cid = j.name
          

    return render(request, 'viewbill.html', {'result': cus})


def paymode(request,id):
   return render(request, "addpaymode.html", {'result':id})

from django.shortcuts import get_object_or_404

def addcard(request, id):
    if request.method == "POST":
        cardname = request.POST.get('cardname')
        cardno = request.POST.get('cardno')
        cvv = request.POST.get('cvv')
        
        card = cardstbl(cardname=cardname, cardno=cardno, cvv=cvv, pid=id, status='Paid')
        card.save()
        try:
            bill = get_object_or_404(billstbl, pid=id)
            bill.status = 'paid'
            bill.save()
        except billstbl.DoesNotExist:
            pass

    return render(request, "addcard.html", {'result': id})


'''def gpay(request, cid):
        result = billstbl.objects.filter(cid=cid)
        return render(request, 'qrview.html', {'result': result})

def addgpay(request,cid):
    try:
            bill = billstbl.objects.get(cid=cid)
            bill.status = 'paid'
            bill.save()
    except billstbl.DoesNotExist:
            # Handle the case where the billstbl object is not found
            pass
    return render(request,'qrview.html', {'result': cid})

def cash(request):
    return render(request,'cash.html')
'''

