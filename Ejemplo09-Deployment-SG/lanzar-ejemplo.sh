#!/bin/bash
kubectl apply -f deployment-sgbd.yml
kubectl apply -f deployment-sgapi.yml
kubectl apply -f deployment-sgapp.yml

kubectl get deployments -n demo --watch
sudo kubectl port-forward -n demo `kubectl get pods -n demo | grep 'sgapp' | awk '{print $1}'` 80:80
