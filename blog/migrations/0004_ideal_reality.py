# -*- coding: utf-8 -*-
# Generated by Django 1.11.5 on 2017-09-19 07:17
from __future__ import unicode_literals

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('blog', '0003_debug'),
    ]

    operations = [
        migrations.CreateModel(
            name='Ideal_Reality',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('ideal', models.TextField()),
                ('ideal_timestamp', models.DateTimeField()),
                ('reality', models.TextField()),
                ('reality_timestamp', models.DateTimeField()),
            ],
        ),
    ]
