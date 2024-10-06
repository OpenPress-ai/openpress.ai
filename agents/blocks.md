# OpenPress Block System Specification

OpenPress represents webpages as a series of Blocks, which are defined using JSON schemas. This document outlines the Block and Page schemas, along with examples of initial block types.

## Block Schema

Each Block in OpenPress is defined using the following JSON schema:

```json
{
  "type": "object",
  "properties": {
    "type": {
      "type": "string",
      "description": "The type of the block (e.g., 'Container', 'Headline', 'Button', etc.)"
    },
    "id": {
      "type": "string",
      "description": "Unique identifier for the block"
    },
    "attributes": {
      "type": "object",
      "description": "Block-specific attributes"
    },
    "children": {
      "type": "array",
      "items": {
        "$ref": "#"
      },
      "description": "Child blocks (for container-like blocks)"
    }
  },
  "required": ["type", "id"]
}
```

## Page Schema

A Page in OpenPress is composed of multiple Blocks and is defined using the following JSON schema:

```json
{
  "type": "object",
  "properties": {
    "title": {
      "type": "string",
      "description": "The title of the page"
    },
    "slug": {
      "type": "string",
      "description": "The URL slug for the page"
    },
    "blocks": {
      "type": "array",
      "items": {
        "$ref": "#/definitions/block"
      },
      "description": "An array of blocks that make up the page content"
    }
  },
  "required": ["title", "slug", "blocks"],
  "definitions": {
    "block": {
      // Block schema (as defined above)
    }
  }
}
```

## Initial Block Types

### 1. Container

```json
{
  "type": "Container",
  "id": "container-1",
  "attributes": {
    "className": "main-container",
    "style": {
      "backgroundColor": "#f0f0f0",
      "padding": "20px"
    }
  },
  "children": [
    // Child blocks go here
  ]
}
```

### 2. Headline

```json
{
  "type": "Headline",
  "id": "headline-1",
  "attributes": {
    "level": "h1",
    "content": "Welcome to OpenPress",
    "className": "main-title"
  }
}
```

### 3. Button

```json
{
  "type": "Button",
  "id": "button-1",
  "attributes": {
    "text": "Click me",
    "url": "/action",
    "className": "cta-button",
    "style": {
      "backgroundColor": "#007bff",
      "color": "#ffffff"
    }
  }
}
```

### 4. Image

```json
{
  "type": "Image",
  "id": "image-1",
  "attributes": {
    "src": "/images/example.jpg",
    "alt": "Example image",
    "width": 800,
    "height": 600,
    "className": "featured-image"
  }
}
```

### 5. Grid

```json
{
  "type": "Grid",
  "id": "grid-1",
  "attributes": {
    "columns": 3,
    "gap": "20px"
  },
  "children": [
    // Child blocks representing grid items go here
  ]
}
```

### 6. Query Loop

```json
{
  "type": "QueryLoop",
  "id": "query-loop-1",
  "attributes": {
    "postType": "post",
    "limit": 10,
    "orderBy": "date",
    "order": "DESC"
  },
  "children": [
    // Template blocks to be repeated for each query result
  ]
}
```

## Example Page

Here's an example of how these blocks can be composed into a page:

```json
{
  "title": "Welcome to OpenPress",
  "slug": "welcome",
  "blocks": [
    {
      "type": "Container",
      "id": "main-container",
      "attributes": {
        "className": "page-container"
      },
      "children": [
        {
          "type": "Headline",
          "id": "main-headline",
          "attributes": {
            "level": "h1",
            "content": "Welcome to OpenPress"
          }
        },
        {
          "type": "Image",
          "id": "hero-image",
          "attributes": {
            "src": "/images/hero.jpg",
            "alt": "OpenPress Hero Image",
            "width": 1200,
            "height": 600
          }
        },
        {
          "type": "Grid",
          "id": "features-grid",
          "attributes": {
            "columns": 3,
            "gap": "20px"
          },
          "children": [
            {
              "type": "Container",
              "id": "feature-1",
              "children": [
                {
                  "type": "Headline",
                  "id": "feature-1-title",
                  "attributes": {
                    "level": "h3",
                    "content": "Easy to Use"
                  }
                },
                {
                  "type": "Button",
                  "id": "feature-1-button",
                  "attributes": {
                    "text": "Learn More",
                    "url": "/features/easy-to-use"
                  }
                }
              ]
            },
            // Additional feature blocks would go here
          ]
        },
        {
          "type": "QueryLoop",
          "id": "recent-posts",
          "attributes": {
            "postType": "post",
            "limit": 3,
            "orderBy": "date",
            "order": "DESC"
          },
          "children": [
            {
              "type": "Container",
              "id": "post-container",
              "children": [
                {
                  "type": "Headline",
                  "id": "post-title",
                  "attributes": {
                    "level": "h2",
                    "content": "{{post.title}}"
                  }
                },
                {
                  "type": "Button",
                  "id": "read-more",
                  "attributes": {
                    "text": "Read More",
                    "url": "{{post.url}}"
                  }
                }
              ]
            }
          ]
        }
      ]
    }
  ]
}
```

This specification allows for flexible and extensible page composition using various block types. The OpenPress core can use Laravel Blade templating to render these blocks, while other applications could implement their own rendering logic using React or other frontend frameworks.