FROM alpine:latest

# Install PHP + wget
RUN apk add --no-cache php php-cli php-json wget

WORKDIR /app

# Download your files (no copy needed)
RUN wget -O index.php https://raw.githubusercontent.com/bxbzzbbbm-cmyk/animated-garbanzo/refs/heads/main/index.php && \
    wget -O go.php https://raw.githubusercontent.com/bxbzzbbbm-cmyk/animated-garbanzo/refs/heads/main/go.php && \
    wget -O links.json https://raw.githubusercontent.com/bxbzzbbbm-cmyk/animated-garbanzo/refs/heads/main/links.json

# Expose port 5900
EXPOSE 5900

# Start PHP server
CMD php -S 0.0.0.0:5900
