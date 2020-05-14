#/bin/bash
kubectl delete -f "https://cloud.weave.works/k8s/scope.yaml?k8s-version=$(kubectl version | base64 | tr -d '\n')"
kubectl delete -f autoscaler.yml
kubectl delete -f services.yml
kubectl delete -f deployment-sgapp.yml
kubectl delete -f deployment-sgapi.yml
kubectl delete -f deployment-sgbd.yml

