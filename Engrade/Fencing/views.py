from django.http import HttpResponse,HttpResponseNotAllowed
from django.shortcuts import render
from django.shortcuts import redirect,get_object_or_404
# FILE UPLOAD AND VIEW
from  django.core.files.storage import FileSystemStorage
# SESSION
from django.conf import settings
from .models import *
from django.db.models import F
from django.http import HttpResponseBadRequest

def home(request):
    return render(request,'index.html')
def index(request):
    return render(request,'index.html')
def register(request):
    return render(request,'register.html')
def addregister(request):
    if request.method=="POST":
        a=request.POST.get('FullName') 
        b=request.POST.get('Gender')
        c=request.POST.get('Dob')
        d=request.POST.get('Aadhar')
        e=request.POST.get('Weapon') 
        f=request.POST.get('Email')
        g=request.POST.get('Mobile')
        h=request.POST.get('Blood_group')
        i=request.POST.get('Height')
        j=request.POST.get('Weight')
        k=request.POST.get('Fencer_Category')
        l=request.POST.get('District')
        m=request.POST.get('Father_name')
        n=request.POST.get('Mother_name')
        o=request.POST.get('Mobile_No')
        p=request.POST.get('Pincode')
        q=request.POST.get('Address') 
        r=request.POST.get('Landmark') 
        s=request.POST.get('District') 
        u=request.POST.get('State')
        v=request.POST.get('City')
        password=request.POST.get('password')
        myfile=request.FILES['file'] 
        fs=FileSystemStorage()
        filename=fs.save(myfile.name,myfile)
        ins=regtable(FullName=a,Gender=b,Dob=c,Aadhar=d,Weapon=e,Email=f,Mobile=g,Blood_group=h,Height=i,Weight=j,Fencer_category=k
        ,District_p=l,Father_name=m,Mother_name=n,Mobile_No=o,Pincode=p,Address=q,Landmark=r,District=s,State=u,City=v,image=filename,password=password)
        ins.save()
    return render(request,'index.html',{'msg':'Register Success'})

def login(request):
    return render(request,'login.html')

def addlogin(request):
    email=request.POST.get('email')
    password=request.POST.get('password')
    if email=='admin@gmail.com'and password=='admin':
       request.session['admin@gmail.com']='admin@gmail.com'
       request.session['admin']='admin'
       return redirect(index)

    elif regtable.objects.filter(Email=email,password=password).exists():
        userdetails=regtable.objects.get(Email=email,password=password)
        if userdetails.Email==request.POST['email']:
            request.session['userid']=userdetails.id
            request.session['username']=userdetails.FullName 
            return redirect(index)  
    else:
         return render(request,'login.html',{'msg':'Invalid Email or Password'})
def logout(request):
    session_keys=list(request.session.keys())   
    for key in session_keys:
        del request.session[key] 
    return redirect(index) 

def viewuser(request):
    user=regtable.objects.all()
    return render(request,'viewuser.html',{'result':user})  

def addtournament(request):
    return render(request,'addtournament.html')
from django.utils import timezone
def addtour(request):
    if request.method == "POST":
        name = request.POST.get('name') 
        place = request.POST.get('place')
        start_date = request.POST.get('start_date')
        end_date = request.POST.get('end_date')

        # Convert start_date and end_date strings to datetime objects
        start_date = timezone.datetime.strptime(start_date, '%Y-%m-%d').date()
        end_date = timezone.datetime.strptime(end_date, '%Y-%m-%d').date()

        # Check if end_date is less than start_date
        if end_date < start_date:
            return render(request, 'index.html', {'msg': 'End date cannot be less than start date.'})

        # Create and save the tournament instance
        ins = tournamenttable(name=name, place=place, start_date=start_date, end_date=end_date)
        ins.save()

        return render(request, 'index.html', {'msg': 'Added Successfully'})
    else:
        return render(request, 'index.html')


def viewtournament(request):
    today = datetime.date.today()
    user=tournamenttable.objects.all()
    return render(request,'viewtournament.html',{'result':user, 'today': today})  


def add_schedule(request,id):
    user=tournamenttable.objects.get(id=id)
    return render(request,'add_schedule.html',{'result':user}) 

def addsch(request,id):
    if request.method=="POST":
        event=request.POST.get('event') 
        start_time=request.POST.get('start_time')
        tournament=tournamenttable.objects.get(id=id)
        ins=tournament_schedule(tournament=tournament,event=event,start_time=start_time,status='Active')
        ins.save()
    return redirect(viewtournament)
  

def view_schedule(request,id):
    user=tournament_schedule.objects.filter(tournament=id)
    return render(request,'view_schedule.html',{'result':user})
    
def medals(request):
    user=tournamenttable.objects.all()
    return render(request,'medals.html',{'result':user}) 

def add_medal(request,id):
    user=tournamenttable.objects.get(id=id)
    return render(request,'add_medal.html',{'result':user}) 

def addmed(request,id):
    if request.method == "POST":
        country = request.POST.get('country') 
        gold = int(request.POST.get('gold')) 
        silver = int(request.POST.get('silver'))  
        bronze = int(request.POST.get('bronze'))  
        total = gold + silver + bronze 
        tournament = tournamenttable.objects.get(id=id)
        ins = tournament_medals(tournament=tournament, country=country, gold=gold, silver=silver, bronze=bronze, total=total)
        ins.save()
    return redirect(medals)  

def view_medals(request,id):
    user=tournament_medals.objects.filter(tournament=id).order_by('-total')
    return render(request,'view_medals.html',{'result':user})


def pool(request):
    user=tournamenttable.objects.all()
    return render(request,'pool.html',{'result':user})

def add_pool(request,id):
    tournament = tournamenttable.objects.get(id=id)
    registered_users = tournament_register.objects.filter(tournament=tournament)

    return render(request, 'add_pool.html', {'tournament': tournament, 'registered_users': registered_users})

def addpool(request, id):
    if request.method == "POST":
        participant1 = request.POST.get('participant1') 
        participant2 = request.POST.get('participant2') 
        v = int(request.POST.get('v')) 
        m = int(request.POST.get('m'))  
        ts = request.POST.get('ts')  
        tr = request.POST.get('tr')  
        country = request.POST.get('country')  

        # Check if participant1 and participant2 are the same
        if participant1 == participant2:
            return HttpResponseBadRequest("Participant 1 and Participant 2 cannot be the same.")

        # Check if v < m
        if v > m:
            return HttpResponseBadRequest("Invalid input: m must be greater than or equal to v.")

        # Calculate vm as a float
        if m != 0:
            vm = float(v) / float(m)
        else:
            vm = 0.0  # Ensure vm is a float

        # Round vm to two decimal places
        vm = round(vm, 2)

        tournament = tournamenttable.objects.get(id=id)

        ins = tournament_pools(participant1=participant1, participant2=participant2, v=v, m=m, vm=vm, ts=ts, tr=tr, country=country, tournament=tournament)
        ins.save()
    return redirect(pool)

def view_pools(request,id):
    user=tournament_pools.objects.filter(tournament=id)
    return render(request,'view_pools.html',{'result':user})

import datetime

def viewtournament_user(request):
    today = datetime.date.today()
    user = tournamenttable.objects.all()
    return render(request, 'viewtournament_user.html', {'result': user, 'today': today})  

def view_details(request,id):
    user=tournamenttable.objects.get(id=id)
    sh=tournament_schedule.objects.filter(tournament=user.id)
    md=tournament_medals.objects.filter(tournament=user.id).order_by('-total')
    rg=tournament_register.objects.filter(tournament=user.id,status='Accepted').order_by('-score')
    pol=tournament_pools.objects.filter(tournament=user.id)
    return render(request,'tournament_details.html',{'result':sh,'result1':md,'result3':rg,'result4':pol}) 

def userreg_tournament(request,id):
    user=tournamenttable.objects.get(id=id)
    sh=tournament_schedule.objects.filter(tournament=id,status='Active')
    return render(request,'userreg_tournament.html',{'result':user,'res':sh}) 


def add_userreg_tournament(request):
    if request.method == "POST":
        t_id = request.POST.get('t_id') 
        u_id = request.session.get('userid')
        categry = request.POST.get('categry') 
        date = request.POST.get('date') 

        tournament = tournamenttable.objects.get(id=t_id)
        user = regtable.objects.get(id=u_id)

        existing_registration = tournament_register.objects.filter(tournament=tournament, user=user).exists()
        if existing_registration:
            return render(request,'index.html',{'msg':'You are already registered for this tournament.'}) 

        tournament_register.objects.create(tournament=tournament, user=user, category=categry, date=date, status='pending', score=0)
        return redirect(viewtournament_user) 
    
def view_reg(request):
    user=tournament_register.objects.all()
    return render(request,'view_reg.html',{'result':user}) 

def accept_request(request,id):
    user=get_object_or_404(tournament_register,id=id)
    user.status = 'Accepted'
    user.save()
    return redirect(view_reg)

def reject_request(request,id):
    user=get_object_or_404(tournament_register,id=id)
    user.status = 'Rejected'
    user.save()
    return redirect(view_reg)

def up_scores(request,id):
    if request.method == "POST":
        score = request.POST.get('score') 
        user=get_object_or_404(tournament_register,id=id)
        user.score = score
        user.save()
        return redirect(view_reg)
    
def up_status(request,id):
    if request.method == "POST":
        time = request.POST.get('time') 
        user=get_object_or_404(tournament_schedule,id=id)
        user.status = time
        user.save()
        return redirect(viewtournament)

def my_registers(request):
    user=tournament_register.objects.filter(user=request.session['userid'])
    return render(request,'my_registers.html',{'result':user})