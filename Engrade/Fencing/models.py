from django.db import models
class regtable(models.Model):
    FullName=models.CharField(max_length=150) 
    Gender=models.CharField(max_length=150)
    Dob=models.CharField(max_length=150) 
    Aadhar=models.CharField(max_length=150) 
    Weapon=models.CharField(max_length=150) 
    Email=models.CharField(max_length=150) 
    Mobile=models.CharField(max_length=150) 
    Blood_group=models.CharField(max_length=150) 
    Height=models.CharField(max_length=150) 
    Weight=models.CharField(max_length=150) 
    Fencer_category=models.CharField(max_length=150)
    District=models.CharField(max_length=150)  
    Father_name=models.CharField(max_length=150) 
    Mother_name=models.CharField(max_length=150) 
    Mobile_No=models.CharField(max_length=150) 
    Pincode=models.CharField(max_length=150) 
    Address=models.CharField(max_length=150) 
    Landmark=models.CharField(max_length=150) 
    District_p=models.CharField(max_length=150) 
    State=models.CharField(max_length=150) 
    City=models.CharField(max_length=150)
    password=models.CharField(max_length=150) 
    image=models.CharField(max_length=150) 

class tournamenttable(models.Model):
   name=models.CharField(max_length=150) 
   place=models.CharField(max_length=150) 
   start_date=models.DateField(max_length=150) 
   end_date=models.DateField(max_length=150) 

class tournament_schedule(models.Model):
   tournament=models.ForeignKey(tournamenttable, on_delete=models.CASCADE)
   event=models.CharField(max_length=150) 
   start_time=models.TimeField(max_length=150) 
   status=models.CharField(max_length=150) 

class tournament_medals(models.Model):
    tournament = models.ForeignKey(tournamenttable, on_delete=models.CASCADE)
    country = models.CharField(max_length=150) 
    gold = models.IntegerField() 
    silver = models.IntegerField() 
    bronze = models.IntegerField() 
    total = models.IntegerField() 
 
class tournament_register(models.Model):
   tournament=models.ForeignKey(tournamenttable, on_delete=models.CASCADE)
   user=models.ForeignKey(regtable, on_delete=models.CASCADE)
   category=models.CharField(max_length=150) 
   date=models.DateField(max_length=150) 
   status=models.CharField(max_length=150) 
   score = models.IntegerField() 
   
class tournament_pools(models.Model):
    tournament = models.ForeignKey(tournamenttable, on_delete=models.CASCADE)
    participant1 = models.CharField(max_length=150) 
    participant2 = models.CharField(max_length=150) 
    country = models.CharField(max_length=150) 
    v = models.IntegerField() 
    m = models.IntegerField() 
    vm = models.FloatField()  # Change from IntegerField to FloatField
    ts = models.IntegerField()
    tr = models.IntegerField()