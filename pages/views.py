from django.shortcuts import render
from django.views.generic import TemplateView


# Create your views here.
from django.views.decorators.csrf import csrf_exempt
from django.http import JsonResponse
from django.shortcuts import render
from .models import ContactSubmission

@csrf_exempt
def contact_form_submission(request):
    if request.method == "POST":
        name = request.POST.get("name")
        email = request.POST.get("email")
        phone = request.POST.get("phone")
        service = request.POST.get("service")
        note = request.POST.get("note")

        try:
            ContactSubmission.objects.create(
                name=name,
                email=email,
                phone=phone,
                service=service,
                note=note
            )
            return JsonResponse({"status": "success", "message": "Thank you. We will get back to you shortly"})
        except Exception as e:
            return JsonResponse({"status": "error", "message": str(e)}, status=500)

    return JsonResponse({"status": "error", "message": "Invalid request method"}, status=405)

class WebsiteBaseTemplateView(TemplateView):

  def get(self, request, template_name, *args, **kwargs):
    self.template_name = template_name
    return super().get(request, args, kwargs)
