from django.urls import path, re_path
from django.views.generic import TemplateView

from pages.views import WebsiteBaseTemplateView
from .views import contact_form_submission

urlpatterns = [
  path('contact/submit/', contact_form_submission, name='contact_form_submission'),
  re_path(r'^(?P<template_name>[\w,\-]+.html)/?$', WebsiteBaseTemplateView.as_view(), name="command_template"),
  re_path(r'', TemplateView.as_view(template_name='index.html'), name='index'),
]
