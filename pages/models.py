from django.db import models

class ContactSubmission(models.Model):


    SERVICE_CHOICES = [
    ('Leads Manangement Application', 'Leads Manangement Application'),
    ('Music School Application', 'Music School Application'),
    ('Web Development', 'Web Development'),
    ('IT Customization', 'IT Customization'),
    ('IOT Customization', 'IOT Customization'),
]

    name = models.CharField(max_length=255)
    email = models.EmailField()
    phone = models.CharField(max_length=20)
    service = models.CharField(max_length=50, choices=SERVICE_CHOICES)
    note = models.TextField()
    submitted_at = models.DateTimeField(auto_now_add=True)

    def __str__(self):
        return f"{self.name} - {self.service}"
