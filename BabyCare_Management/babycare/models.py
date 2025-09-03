from django.db import models

class parenttbl(models.Model):
    name=models.CharField(max_length=150)
    mname=models.CharField(max_length=150)
    lname=models.CharField(max_length=150)
    address=models.CharField(max_length=150)
    district=models.CharField(max_length=150)
    email=models.CharField(max_length=150)
    password=models.CharField(max_length=150)
    current_date = models.DateTimeField(auto_now_add=True)


class childtbl(models.Model):
    name=models.CharField(max_length=150)
    age=models.CharField(max_length=150)
    description=models.CharField(max_length=150)
    pid=models.CharField(max_length=150)
    date=models.CharField(max_length=150)
    gender=models.CharField(max_length=150)
    dob=models.CharField(max_length=150)
    staytype_id=models.CharField(max_length=150)
    category_id=models.CharField(max_length=150)
    options_id=models.CharField(max_length=150)
    requirements_id=models.CharField(max_length=150)

class staytypetbl(models.Model):
    name=models.CharField(max_length=150)

class categorytbl(models.Model):
    name=models.CharField(max_length=150)

class optiontbl(models.Model):
    name=models.CharField(max_length=150)

class requirementtbl(models.Model):
    name=models.CharField(max_length=150)


class feedbacks(models.Model):
    pid=models.CharField(max_length=150)
    feedback=models.CharField(max_length=150)

class attendance(models.Model):
    b_id=models.CharField(max_length=150)
    p_id=models.CharField(max_length=150)
    date=models.CharField(max_length=150)
    status=models.CharField(max_length=150)

class eventtbl(models.Model):
    name=models.CharField(max_length=150)
    image=models.CharField(max_length=150)

class notitbl(models.Model):
    noti=models.CharField(max_length=150)

class alerttbl(models.Model):
    pid=models.CharField(max_length=150)
    msg=models.CharField(max_length=150)

class pickuptbl(models.Model):
    pid=models.CharField(max_length=150)
    name=models.CharField(max_length=150)
    image=models.CharField(max_length=150)

class billstbl(models.Model):
    pid=models.CharField(max_length=150)
    cid=models.CharField(max_length=150)
    fees=models.CharField(max_length=150)
    status=models.CharField(max_length=150)
    pname=models.CharField(max_length=150)
    cname=models.CharField(max_length=150)

class cardstbl(models.Model):
    cardname=models.CharField(max_length=150)
    cardno=models.CharField(max_length=150)
    cvv=models.CharField(max_length=150)
    pid=models.CharField(max_length=150)
    status=models.CharField(max_length=150)
    
