#!/bin/bash
kubectl apply -f deployment-init-sg.yml
kubectl get pods -n demo --watch
sudo kubectl port-forward `kubectl get pods -n demo | grep 'mysql' | awk '{print $1}'` -n demo 3306:3306
