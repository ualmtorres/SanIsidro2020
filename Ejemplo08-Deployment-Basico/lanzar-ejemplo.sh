#!/bin/bash
kubectl apply -f deployment-myweb.yml
kubectl get deployments -n demo --watch
sudo kubectl port-forward -n demo `kubectl get pods -n demo | grep 'myweb' | awk '{print $1}'` 80:80
