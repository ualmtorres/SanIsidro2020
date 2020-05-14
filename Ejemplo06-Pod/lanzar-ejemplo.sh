#!/bin/bash
kubectl apply -f namespace-demo.yml
kubectl apply -f pod-myweb.yml
kubectl get pods --watch
sudo kubectl port-forward myweb 80:80
